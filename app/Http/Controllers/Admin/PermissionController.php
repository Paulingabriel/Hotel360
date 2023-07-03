<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('superadmin.permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required']);

        Permission::create($validated);
        toastr()->success('Enregistrement éffectué avec succès!');
        return to_route('superadmin.permissions.index')->with('message', 'Permission created.');
    }

    public function show(Permission $permission)
    {
        Role::destroy($permission->id);
        toastr()->success('Suppression éffectué avec succès!');
        return redirect()->back();
    }

    public function edit(Permission $permission)
    {
        $roles = Role::all();
        return view('superadmin.permissions.edit', compact('permission', 'roles'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $permission->update($validated);
        toastr()->success('Enregistrement éffectué avec succès!');
        return to_route('superadmin.roles.index');
    }

   
    public function destroy(Permission $permission)
    {
        Role::destroy($permission->id);
        toastr()->success('Suppression éffectué avec succès!');
        return redirect()->back();
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if($permission->hasRole($request->role)){
            toastr()->error("Ce role existe déjà!");
            return redirect()->back();
        }
        $permission->assignRole($request->role);
        toastr()->success('Role assigné avec succès!');
        return redirect()->back();
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            toastr()->success('Suppression éffectué avec succès!');
            return redirect()->back();
        }
        toastr()->success('Role inexistant!');
        return redirect()->back();
    }

}
