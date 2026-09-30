<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(Request $request)
    {
        $this->authorize('read', User::class);
        if ($request->ajax()) {
            $user = User::where('id', '!=', 1)->orderBy('id', 'desc');

            return DataTables::eloquent($user)
                ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        $query->where(function ($w) use ($request) {
                            $search = $request->get('search');
                            $w->where('name', 'LIKE', "%$search%")
                                ->orWhere('mobile', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%");
                        });
                    }
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1
                        ? '<span class="badge rounded-pill bg-success">Active</span>'
                        : '<span class="badge rounded-pill bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $action = '<div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">';

                    if (Auth::user()->can('readPermission', \App\Models\User::class)) {
                        $action .= '<li>
                                        <a class="dropdown-item edit-item-btn" href="'. route('backend.permissions.index', $row->id).'">
                                            <i class="bx bx-key align-middle me-2 text-muted"></i> Permission
                                        </a>
                                    </li>';
                    }

                    if (Auth::user()->can('edit', \App\Models\User::class)) {
                        $action .= '<li>
                                        <a class="dropdown-item edit-item-btn" href="' . route('backend.users.edit', $row->id) . '">
                                            <i class="bx bx-edit align-middle me-2 text-muted"></i> Edit
                                        </a>
                                    </li>';
                    }


                    if (Auth::user()->can('delete', \App\Models\User::class)) {
                        $action .= '<li>
                                <a href="#" data-route ="' . route('backend.users.destroy', $row->id) . '" class="dropdown-item destroy" data-toggle="tooltip" data-placement="top" title="Destory" data-original-title="Delete"><i class="bx bx-trash align-middle me-2 text-muted"></i> Delete</a>
                                    </li>';
                    }

                    $action .= '</ul></div>';

                    return $action;
                })

                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('template.user.index');
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('template.user.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $this->validate($request, [
            'name'        => 'required',
            'mobile'      => 'required|numeric|unique:users,mobile',
            'password'    => 'required',
            'email'       => 'required|email|unique:users,email',
            'status'      => 'required|in:1,0',

        ]);
        $data['name']                = $request->name;
        $data['mobile']              = $request->mobile;
        $data['email']               = $request->email;
        $data['password']            = $request->password ? bcrypt($request->password) : null;
        $data['status']              = $request->status;
        if ($request->image) {
            $uploadStatus = Helper::uploadImage($request->image, 'users');
            if ($uploadStatus['status']) {
                $data['image']   = $uploadStatus['name'];
            }
        }

        User::create($data);

        return redirect()->route('backend.users.index')->with(['alert-type' => 'success', 'message' => 'User Added successfully']);
    }

    public function edit($id)
    {
        $this->authorize('edit', User::class);
        $user        = User::findOrFail($id);
        return view('template.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('edit', User::class);
        $user        = User::findOrFail($id);
        $this->validate($request, [
            'name'        => 'required',
            'mobile' => [
                'required',
                'numeric',
                'digits:10',
                Rule::unique('users')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'status'      => 'required|in:1,0',

        ]);

        if ($request->password != null) {
            $data['password']   = bcrypt($request->password);
        }

        $data['name']   = $request->name;
        $data['mobile'] = $request->mobile;
        $data['email']  = $request->email;
        $data['status'] = $request->status;

        if ($request->image) {
            $uploadStatus = Helper::uploadImage($request->image, 'users');
            if ($uploadStatus['status']) {
                $data['image']  = $uploadStatus['name'];
                if ($user->image) {
                    Helper::unlinkImage($user->image);
                }
            }
        }

        $user->update($data);

        return redirect()->route('backend.users.edit', $id)->with(['alert-type' => 'success', 'message' => 'User Updated successfully']);
    }

    public function destroy(string $id)
    {
        $this->authorize('delete', User::class);
        $response = [
            'status'    => false,
            'message'   => 'Invalid Access!.',
        ];

        try {
            $customer = User::findOrFail($id);

            $customer->delete();
            $response = [
                'status'    => true,
                'message'   => 'Data deleted successfully.',
            ];
        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Entries could not be deleted due to dependency.',
            ];
        }

        return $response;
    }

    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('template.user.profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data['name']   = $request->name;
        $data['email']  = $request->email;
        $data['mobile'] = $request->mobile;

        if ($request->hasFile('image')) {
            $uploadData = Helper::uploadImage($request->image, 'users');
            if ($uploadData['status']) {
                $data['image'] = $uploadData['name'];
                if ($user->image) {
                    Helper::unlinkImage($user->image);
                }
            }
        }

        $user->update($data);

        return redirect()->back()->with(['alert-type' => 'success', 'message' => 'Profile updated successfully']);
    }

    public function changePassword()
    {
        $user = auth()->user();
        return view('template.user.change_password', compact('user'));
    }

    public function oldPassword(Request $request)
    {
        $old_password = auth()->user()->password;
        $data =  "false";
        if (Hash::check($request->old, $old_password)) {
            $data =  "true";
        }
        return $data;
    }

    public function updatePassword(Request $request, $id)
    {
        $validated = $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::findOrFail($id);

        if (!Hash::check($validated['old_password'], $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $user->password = Hash::make($validated['new_password']);
        $user->update($validated);


        return back()->with(['alert-type' => 'success', 'message' => 'Password updated successfully.']);
    }
}
