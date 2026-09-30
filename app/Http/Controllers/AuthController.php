<?php

namespace App\Http\Controllers;

use App\Mail\Auth\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $checkUser = User::query()
            ->where(function ($query) use ($request) {
                $query->where('email', $request->username);
                $query->orWhere('mobile', $request->username);
            })
            ->first();

        if (!$checkUser) {
            return redirect()->back()->withInput()->withErrors(['errors' => "Sorry, we don't recognize this account."]);
        }

        if ($checkUser->status != 1) {
            return redirect()->back()->withInput()->withErrors(['errors' => "This account has been inactive. Please contact support team."]);
        }

        $field = $request->username === $checkUser->email ? 'email' : ($request->username === $checkUser->mobile ? 'mobile' : 'mobile');

        if (Auth::attempt(array($field => $request->username, 'password' => $request->password))) {
            $checkUser->update(['last_login_at' => now()]);
            return redirect()->route('backend.dashboard')->with(['message' => 'Login Successful']);
        }
        return redirect()->back()->withInput()->withErrors(['errors' => "Wrong password. Try again or click Forgot password to reset it."]);
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {

        $request->validate([
            'email' => 'required|email'
        ]);

        $checkUser = User::select('id', 'name', 'email', 'status')->where('email', $request->email)->first();
        if (!$checkUser) {
            return redirect()->back()->withInput()->withErrors(['errors' => "Sorry, we don't recognize this account."]);
        }

        if ($checkUser->status != 1) {
            return redirect()->back()->withInput()->withErrors(['errors' => "Your account has been inactive. Please contact support team."]);
        }

        $remember_token     = Str::random(80);
        DB::beginTransaction();
        try {
            Mail::to($checkUser->email)->send(new ForgotPasswordMail($remember_token, $checkUser));
            $data['remember_token']     = $remember_token;
            $data['token_expire_at']    = date('Y-m-d H:i:s', strtotime("+15 minutes"));
            $checkUser->update($data);
        } catch (\Exception $e) {
            DB::rollBack();

            dd($e->getMessage());
            return redirect()->route('backend.auth.forgot-password')->withInput()->withErrors(['errors' => "Email not send. Please contact support team."]);
        }

        DB::commit();
        return redirect()->route('backend.auth.forgot-password')->with('message', "Reset Password Link has been send to your requested email address.");
    }

    public function showResetPasswordForm($token)
    {
        $user = User::where('remember_token', $token)->first();

        abort_if(!$user, 404);

        if (now()->greaterThan($user->token_expire_at)) {
            return redirect()->route('backend.auth.forgot-password')->withErrors(['errors' => "The password reset link has expired."]);
        }

        return view('auth.reset-password', ['token' => $token]);
    }

    public function createPassword(Request $request, $remember_token)
    {
        $request->validate([
            'new_password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
            'confirm_password' => ['required', 'same:new_password'],
        ]);

        if ($request->confirm_password != $request->new_password) {
            return redirect()->back()->withInput()->withErrors(['errors' => "New password and confirm password does not match."]);
        }

        $checkUser = User::where('remember_token', $remember_token)->first();
        if (!$checkUser) {
            return redirect()->back()->withInput()->withErrors(['errors' => "Invalid password reset link."]);
        }

        if ($checkUser->status != 1) {
            return redirect()->back()->withInput()->withErrors(['errors' => "Your account has been inactive. Please contact support team."]);
        }
        if (now()->greaterThan($checkUser->token_expire_at)) {
            return redirect()->back()->withInput()->withErrors(['errors' => "Reset Link has been expired."]);
        }

        $checkUser->update(['password' => bcrypt($request->confirm_password), 'token_expire_at' => NULL, 'remember_token' => NULL]);
        return redirect()->route('backend.auth.index')->with('message', "Password reset successfully. Login to access your account!.");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('backend.auth.index')->with('message', 'You have been logged out.');
    }
}
