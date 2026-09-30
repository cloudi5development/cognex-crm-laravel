<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Setting;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request, $type)
    {
        if ($type == "general") {
            $this->authorize('general', Setting::class);
            $settings = Setting::pluck('value', 'key')->all();
            return view('template.settings.general', compact('settings'));
        }

        if ($type == "mail") {
            $this->authorize('email', Setting::class);
            $settings = Setting::pluck('value', 'key')->all();
            return view('template.settings.mail', compact('settings'));
        }
    }

    public function update(Request $request, $type)
    {
        if ($type == "general") {
            $this->authorize('general', Setting::class);
            $values = ($request->except(['_token']));
            foreach ($values as $key => $value) {
                $settings = Setting::where('key', '=', $key)->first();
                if ($settings) {
                    $settings->update(['value' => $value]);
                } else {
                    $data['key']    = $key;
                    $data['value']  = $value;
                    Setting::create($data);
                }
            }
            return redirect()->route('backend.settings.index', 'general')->with(['message' => 'General Settings Updated successfully']);
        }

        if ($type == "mail") {
            $this->authorize('email', Setting::class);
            $values = ($request->except(['_token']));
            foreach ($values as $key => $value) {
                $settings = Setting::where('key', '=', $key)->first();
                if ($settings) {
                    $settings->update(['value' => $value]);
                } else {
                    $data['key']    = $key;
                    $data['value']  = $value;
                    Setting::create($data);
                }
            }
            return redirect()->route('backend.settings.index', 'mail')->with(['message' => 'Mail Configuration Updated successfully']);
        }

        if ($type == "test_mail") {
            $message = $request->message;
            try {
                Mail::to($request->mail_to_address)->send(new TestMail($message));
                return redirect()->route('backend.settings.index', 'mail')->with(['message' => 'Test Mail Sent successfully', 'alert-type' => 'success']);
            } catch (Exception $e) {
                return redirect()->route('backend.settings.index', 'mail')->with(['message' => "Email not send. Please check email configuration.", 'alert-type' => 'error']);
            }
        }
    }
}
