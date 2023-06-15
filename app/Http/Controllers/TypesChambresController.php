<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ChambresPr;
use App\Models\ChambresPs;
use Illuminate\Http\Request;
use App\Models\TypesChambres;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TypesChambresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeschambres= TypesChambres::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        return view("typesChambres.index", compact('typeschambres' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("typesChambres.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'titre' => 'required',
            'code' => 'required',
            'description' => 'nullable',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'enfants' => 'required|numeric',
            'adultes' => 'required|numeric',
            'prixpersup' => 'numeric',
            'prixlitsup' => 'numeric',
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:5000'],
        ]);

        //dd($request);

        if($validation->fails()){
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }

        try{

            $data = new TypesChambres();

            $data->titre = $request->titre;
            $data->code = $request->code;
            $data->description = $request->description;
            $data->min = $request->min;
            $data->max = $request->max;
            $data->enfants = $request->enfants;
            $data->adultes = $request->adultes;
            $data->hotel_id = $request->user()->hotel_id;
            $data->prixpersup = $request->prixpersup;
            $data->prixlitsup = $request->prixlitsup;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = date('YmdHi') . ucfirst($request->titre) . '.' . $extension;
                $file->move('uploads/images/', $filename);
                $data->image = $filename;
            } else {
                $data->image = 'default.png';
            }
            //dd($data);

            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('typesChambres/index');
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
    public function edit($id)
    {
        $typeschambres = TypesChambres::FindOrFail($id);
        return view('typesChambres.edit', compact('typeschambres'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'titre' => 'required',
            'code' => 'required',
            'description' => 'nullable',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'enfants' => 'required|numeric',
            'adultes' => 'required|numeric',
            'prixpersup' => 'numeric',
            'prixlitsup' => 'numeric',
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:5000'],
        ]);

        if($validation->fails()){
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = TypesChambres::FindOrFail($id);

            $data->titre = $request->titre;
            $data->code = $request->code;
            $data->description = $request->description;
            $data->min = $request->min;
            $data->max = $request->max;
            $data->enfants = $request->enfants;
            $data->adultes = $request->adultes;
            $data->hotel_id = $request->user()->hotel_id;
            $data->prixpersup = $request->prixpersup;
            $data->prixlitsup = $request->prixlitsup;

            if ($request->hasFile('image')) {
                $destination = 'uploads/images/' . $data->image;
                $destination_default = 'uploads/images/default.png';
                if ($destination_default != $destination  && File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = date('YmdHi') . ucfirst($request->titre) . '.' . $extension;
                $file->move('uploads/images/', $filename);
                $data->image = $filename;
            }
            //dd($data);
            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('typesChambres/index');
        } catch (Exception $e) {

            toastr()->error(
                "Echec de l'enregistrement!"
           );
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = TypesChambres::findOrFail($id);
            $destination = 'uploads/images/' . $data->image;
            $destination_default = 'uploads/images/default.png';

            if ($destination_default != $destination  && File::exists($destination)) {
                File::delete($destination);
            }
            $data->delete();
            toastr()->success('Suppression avec succès de l\'enregistrement');
        } catch (Exception $e) {

            toastr()->error('Echec de suppression de l\'enregistrement');
        }
        return redirect()->back();
    }
}
