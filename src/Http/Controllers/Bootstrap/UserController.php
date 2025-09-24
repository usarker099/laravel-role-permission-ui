<?php

namespace YourVendor\RolePermissionUi\Http\Controllers\Bootstrap;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::with('roles', 'permissions')->get();
        return view('role-permission-ui::bootstrap.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified user's roles and permissions.
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name');
        $permissions = Permission::all()->pluck('name');

        return view('role-permission-ui::bootstrap.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified user's roles and permissions.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array',
            'permissions' => 'array',
        ]);

        // Sync roles and permissions
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);

        return redirect()->route('role-permission-ui.bootstrap.users.index')->with('success', 'User roles and permissions updated successfully.');
    }
}
