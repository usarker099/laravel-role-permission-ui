<?php

namespace sarker\RolePermissionUi\Http\Controllers\Inertia;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
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
        $users = User::with('roles', 'permissions')->get()->map(fn ($user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->roles->pluck('name'),
            'permissions' => $user->permissions->pluck('name'),
        ]);

        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the specified user's roles and permissions.
     */
    public function edit(User $user)
    {
        $user->load('roles', 'permissions');
        $roles = Role::all()->pluck('name');
        $permissions = Permission::all()->pluck('name');

        return Inertia::render('Users/Form', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->roles->pluck('name'),
                'permissions' => $user->permissions->pluck('name'),
            ],
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
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

        return redirect()->route('role-permission-ui.inertia.users.index')->with('success', 'User roles and permissions updated successfully.');
    }
}
