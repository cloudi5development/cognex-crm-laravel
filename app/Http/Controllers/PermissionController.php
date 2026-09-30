<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PermissionController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index($id)
    {
        $this->authorize('readPermission', User::class);

        $permissions = Permission::get();
        $user        = User::findOrFail($id);
        return view('template.user.permissions.index', compact('permissions', 'user'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('editPermission', User::class);

        $role = User::where('id', $id)->first();

        if (array_key_exists('permissions', $request->all())) {
            $role->permissions()->sync($request->permissions);
        } else {
            $role->permissions()->sync([]);
        }

        return redirect()->route('backend.permissions.index', $id)->with(["message" => "Permissions are updated successfully", "alert-type" => 'success']);
    }
}
