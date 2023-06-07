<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ChambresPs;
use Illuminate\Http\Request;
use App\Models\TypesChambres;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChambresPsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chambresps = ChambresPs::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        return view("chambresPs.index", compact( 'chambresps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeschambres = TypesChambres::all();
        return view("chambresPs.create", compact('typeschambres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'prixsieste' => 'required|gt:1',
            'prixheure' => 'required|gt:1',
            'prixnuitee' => 'required|gt:1',
            'titre' => 'required',
            'date1' => 'required|date',
            'date2' => 'required|date|after:date1',
            'types_chambre_id' => '',
        ]);

        if($validation->fails()){
            toastr()->error('Veuillez remplir tous les champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }

        try{

            $data = new ChambresPs();

            $data->prixsieste = $request->prixsieste;
            $data->prixheure = $request->prixheure;
            $data->prixnuitee = $request->prixnuitee;
            $data->hotel_id = $request->user()->hotel_id;
            $data->titre = $request->titre;
            $data->date1 = $request->date1;
            $data->date2 = $request->date2;
            $data->types_chambre_id = $request->types_chambre_id;
            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('chambresPs/index');
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
        $chambresps = ChambresPs::FindOrFail($id);
        $typeschambres = TypesChambres::all();
        return view('ChambresPs.edit', compact('chambresps', 'typeschambres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(), [
            'prixsieste' => 'required|gt:1',
            'prixheure' => 'required|gt:1',
            'prixnuitee' => 'required|gt:1',
            'titre' => 'required',
            'date1' => 'required|date',
            'date2' => 'required|date|after:date1',
            'types_chambre_id' => 'required',
        ]);

        if($validation->fails()){
            toastr()->error('Veuillez remplir tous les champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = ChambresPs::FindOrFail($id);

            $data->prixsieste = $request->prixsieste;
            $data->prixheure = $request->prixheure;
            $data->prixnuitee = $request->prixnuitee;
            $data->hotel_id = $request->user()->hotel_id;
            $data->titre = $request->titre;
            $data->date1 = $request->date1;
            $data->date2 = $request->date2;
            $data->types_chambre_id = $request->types_chambre_id;

            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('chambresPs/index');
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
        ChambresPs::destroy($id);
        toastr()->success('Suppression éffectuée avec succès!');
        return redirect()->back();
    }
}
