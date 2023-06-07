<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function edit()
    {
        $auth = Auth::user();
        return view('Auth.profil', compact('auth'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => ['required', 'email'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:5000'],
        ]);
        if ($validatedData->fails()) {
            // toastr()->error('Veuillez remplir ce champ.');
            return redirect()
                ->back()
                ->withErrors($validatedData)
                ->withInput();
        }
        try {
            $data =  User::FindOrFail($id);

            $data->name = ucfirst($request->name);
            $data->email = $request->email;

            if ($request->hasFile('image')) {
                $destination = 'uploads/images/' . $data->image;
                $destination_default = 'uploads/images/default.png';
                if ($destination_default != $destination  && File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = date('YmdHi') . ucfirst($request->name) . '.' . $extension;
                $file->move('uploads/images/', $filename);
                $data->image = $filename;
            }
            
            $data->update();
            toastr()->success('Modifications éffectuées avec succès!');
            return to_route('auth/edit');


        } catch (Exception $e) {

            toastr()->error(
                "Echec d'enregistrement "
            );
            return to_route('superadmin.users.index');
        }
    }
}
