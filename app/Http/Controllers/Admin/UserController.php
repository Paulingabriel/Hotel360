<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $users = User::latest()->get();

        return view('superadmin.users.index', compact('users', 'hotels'));
    }

    public function store(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => ['required', 'email'],
            'password' => ['required'],
            'hotel_id' => ['required'],
        ]);

        if ($validatedData->fails()) {
            toastr()->error('Veuillez remplir ce champ.');
            return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }
        try {
            $data = new User();
            $data->name = ucfirst($request->name);
            $data->email = $request->email;
            $data->hotel_id = $request->hotel_id;
            $data->password =
                Hash::make($request->password);
            $data->save();
            toastr()->success('Enregistrement éffectué avec succès!');
            return to_route('superadmin.users.index');


        } catch (Exception $e) {

            toastr()->error(
                "Echec d'enregistrement "
            );
            return to_route('superadmin.users.index');
        }
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $hotels = Hotel::all();
        $hotel = Hotel::where('id','=',$user->hotel_id)->first();
        return view('superadmin.users.edit', compact('user', 'permissions', 'roles', 'hotels', 'hotel'));
    }

    public function update(Request $request, User $user)
    {

        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => ['required', 'email'],
            'password' => ['required'],
            'hotel_id' => ['required'],
        ]);

        if ($validatedData->fails()) {
            toastr()->error('Veuillez remplir ce champ.');
            return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }
        try {
            $data =  User::FindOrFail($user->id);

            $data->name = ucfirst($request->name);
            $data->email = $request->email;
            $data->hotel_id = $request->hotel_id;
            $data->password =$request->password;
            $data->update();
            toastr()->success('Modifications éffectuées avec succès!');
            return to_route('superadmin.users.index');


        } catch (Exception $e) {

            toastr()->error(
                "Echec d'enregistrement "
            );
            return to_route('superadmin.users.index');
        }
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        toastr()->success('Role assigné avec succès!');
        return redirect()->back();
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        toastr()->success('Suppression effectuée avec succès!');
        return redirect()->back();
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        toastr()->success('Permission assignée avec succès!');
        return redirect()->back();
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        toastr()->success('Suppression effectuée avec succès!');
        return redirect()->back();
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        toastr()->success('Suppression éffectué avec succès!');
        return redirect()->back();
    }
}
