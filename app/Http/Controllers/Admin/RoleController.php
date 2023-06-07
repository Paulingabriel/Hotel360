<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['superadmin'])->latest()->get();
        return view('superadmin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Role::create($validated);
        toastr()->success('Enregistrement éffectué avec succès!');
        return to_route('superadmin.roles.index');
    }

    public function show(Role $role)
    {
        Role::destroy($role->id);
        toastr()->success('Suppression éffectué avec succès!');
        return redirect()->back();
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('superadmin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);
        toastr()->success('Enregistrement éffectué avec succès!');
        return to_route('superadmin.roles.index');
    }

   
    public function destroy(Role $role)
    {
        Role::destroy($role->id);
        toastr()->success('Suppression éffectué avec succès!');
        return redirect()->back();
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission)){
            toastr()->error("Cette permission existe déjà!");
            return redirect()->back();
        }
        $role->givePermissionTo($request->permission);
        toastr()->success('Permission assignée avec succès!');
        return redirect()->back();
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            toastr()->success('Suppression éffectué avec succès!');
            return redirect()->back();
        }
        toastr()->success('Permission inexistante!');
        return redirect()->back();
    }

}
