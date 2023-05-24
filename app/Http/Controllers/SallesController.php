<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Etages;
use App\Models\Salles;
use App\Models\TypesSalles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SallesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salles::latest()->get();
        return view("salles.index", compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typessalles = TypesSalles::all();
        $etages = Etages::all();
        return view("salles.create", compact('typessalles','etages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'num' => 'required',
            'nom' => 'required',
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

            $data = new Salles();

            $data->num = $request->num;
            $data->nom = $request->nom;
            $data->types_salle_id = $request->types_salle_id;
            $data->etage_id = $request->etage_id;
            $data->active = $request->active == 'on' ? 0 : 1;
            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('salles/index');
        } catch (Exception $e) {

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
        $salles = Salles::FindOrFail($id);
        $typessalles = TypesSalles::all();
        $etages = etages::all();
        return view('salles.edit', compact('salles', 'typessalles', 'etages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'num' => 'required',
            'nom' => 'required',
        ]);

        if($validation->fails()){
            toastr()->error('Veuillez remplir ces champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = Salles::FindOrFail($id);


            $data->num = $request->num;
            $data->nom = $request->nom;
            $data->types_salle_id = $request->types_salle_id;
            $data->etage_id = $request->etage_id;
            $data->active = $request->active == 'on' ? 0 : 1;

            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('salles/index');
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
    public function destroy($id)
    {
        Salles::destroy($id);
        toastr()->success('Suppression éffectuée avec succès!');
        return redirect()->back();
    }
}