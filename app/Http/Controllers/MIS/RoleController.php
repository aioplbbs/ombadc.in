<?php

namespace App\Http\Controllers\MIS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MIS\RoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = [
            'title' => "Roles",
            'items' => ["Home"],
            'last_item' => "Roles"
        ];
        $roles = Role::where('name', '<>', 'Super Admin')->get();

        return view('mis.roles.index', compact('roles', 'breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = [
            'title' => "Add Role",
            'items' => ["Home", "Roles"],
            'last_item' => "Add Role"
        ];
        $permissions = Permission::where('name', 'LIKE', "mis%")->get(); //Load all mis permissions

        $crudMatrix = []; //for all crud operations
        $actionPermissions = []; //for all other approve/reject functionalities

        foreach ($permissions as $permission) {
            $parts = explode('.', $permission->name);
            // CRUD permissions
            if (count($parts) === 3 && in_array(end($parts), ['add','edit','view','delete'])) {
                // mis.proposal.add
                [$scope, $module, $action] = $parts;
                $crudMatrix[$module]['main'][$action] = $permission->name;
            } elseif (count($parts) === 4 && in_array(end($parts), ['add','edit','view','delete'])) {
                // mis.mpr.entry.add
                [$scope, $module, $resource, $action] = $parts;
                $crudMatrix[$module][$resource][$action] = $permission->name;
            }
            // -------------------------
            // Action / approval permissions
            // -------------------------
            else {
                $module = $parts[1] ?? 'other';
                $actionPermissions[$module][] = $permission->name;
            }
        }

        return view('mis.roles.create', compact('crudMatrix','actionPermissions', 'breadcrumb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $breadcrumb = [
            'title' => "Edit Role",
            'items' => ["Home", "Roles"],
            'last_item' => "Edit Role"
        ];
        $permissions = Permission::where('name', 'LIKE', "mis%")->get(); //Load all mis permissions

        $crudMatrix = []; //for all crud operations
        $actionPermissions = []; //for all other approve/reject functionalities

        foreach ($permissions as $permission) {
            $parts = explode('.', $permission->name);
            // CRUD permissions
            if (count($parts) === 3 && in_array(end($parts), ['add','edit','view','delete'])) {
                // mis.proposal.add
                [$scope, $module, $action] = $parts;
                $crudMatrix[$module]['main'][$action] = $permission->name;
            } elseif (count($parts) === 4 && in_array(end($parts), ['add','edit','view','delete'])) {
                // mis.mpr.entry.add
                [$scope, $module, $resource, $action] = $parts;
                $crudMatrix[$module][$resource][$action] = $permission->name;
            }
            // -------------------------
            // Action / approval permissions
            // -------------------------
            else {
                $module = $parts[1] ?? 'other';
                $actionPermissions[$module][] = $permission->name;
            }
        }

        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('mis.roles.edit', compact('crudMatrix','actionPermissions', 'breadcrumb', 'rolePermissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        DB::transaction(function() use($request, $role) {
            $role->update([
                'name' => $request->name
            ]);

            $role->syncPermissions($request->permissions ?? []);
        });

        return redirect()->back()->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully.');
    }

    public function activate(Role $role){
        $role->update(['status'=>1]);
        return redirect()->back()->with('success', 'Role activated successfully');
    }

    public function deactivate(Role $role){
        $role->update(['status'=>0]);
        return redirect()->back()->with('success', 'Role deactivated successfully');
    }
}
