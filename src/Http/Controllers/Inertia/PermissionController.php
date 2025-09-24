<?php

namespace YourVendor\RolePermissionUi\Http\Controllers\Inertia;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     */
    public function index()
    {
        $permissions = Permission::all()->pluck('name');
        return Inertia::render('Permissions/Index', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create()
    {
        return Inertia::render('Permissions/Form');
    }

    /**
     * Store a newly created permission in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('role-permission-ui.inertia.permissions.index')->with('success', 'Permission created successfully.');
    }

    /**
     * Remove the specified permission from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('role-permission-ui.inertia.permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
