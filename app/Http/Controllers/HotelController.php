<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Pays;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::get();
        return view("hotel.index", compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pays = Pays::all();
        return view("hotel.create", compact('pays'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nom' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'tel1' => 'required',
            'tel2' => 'nullable',
            'devise' => 'required',
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:5000'],
        ]);

        if($validation->fails()){
            toastr()->error('Veuillez remplir tous les champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }

        // dd($request);

        try{

            $data = new Hotel();

            $data->nom = $request->nom;
            $data->adresse = $request->adresse;
            $data->email = $request->email;
            $data->ville = $request->ville;
            $data->tel1 = $request->tel1;
            $data->tel2 = $request->tel2;
            $data->pays = $request->pays;
            $data->devise = $request->devise;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = date('YmdHi') . ucfirst($request->nom) . '.' . $extension;
                $file->move('uploads/images/', $filename);
                $data->image = $filename;
            } else {
                $data->image = 'default.png';
            }

            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('hotels/index');
        } catch (Exception $e) {

            dd($e);

             toastr()->error(
                 "Echec de l'enregistrement!"
            );
            return redirect()->back();
        }

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
    public function edit(string $id)
    {
        $pays = Pays::all();
        $hotel = Hotel::FindOrFail($id);

        return view('hotel.edit', compact('hotel', 'pays'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'nom' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'tel1' => 'required',
            'tel2' => 'nullable',
            'devise' => 'required',
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:5000'],
        ]);

        if($validation->fails()){
            toastr()->error('Veuillez remplir tous les champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = Hotel::FindOrFail($id);


            $data->nom = $request->nom;
            $data->adresse = $request->adresse;
            $data->email = $request->email;
            $data->ville = $request->ville;
            $data->tel1 = $request->tel1;
            $data->tel2 = $request->tel2;
            $data->pays = $request->pays;
            $data->devise = $request->devise;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = date('YmdHi') . ucfirst($request->nom) . '.' . $extension;
                $file->move('uploads/images/', $filename);
                $data->image = $filename;
            } else {
                $data->image = 'default.png';
            }


            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('hotels/index');
        } catch (Exception $e) {

            toastr()->error(
                "Echec de l'enregistrement!" . $request->name
            );
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Hotel::destroy($id);
        toastr()->success('Suppression éffectuée avec succès!');
        return redirect()->back();
    }
}
