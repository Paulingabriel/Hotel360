<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Salles;
use App\Models\SallesPs;
use App\Models\TypesSalles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SallesPsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sallesps = SallesPs::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        return view("SallesPs.index", compact( 'sallesps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typessalles = TypesSalles::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        $salles = Salles::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        return view("SallesPs.create", compact('typessalles', 'salles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'prix' => 'required|gt:0',
            'titre' => 'required',
            'date1' => 'required|date',
            'date2' => 'required|date|after:date1',
        ]);

        if($validation->fails()){
            Toastr()->error('Veuillez remplir tous les champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }

        try{

            $data = new SallesPs();

            $data->prix = $request->prix;
            $data->titre = $request->titre;
            $data->date1 = $request->date1;
            $data->date2 = $request->date2;
            $data->hotel_id = $request->user()->hotel_id;
            $data->types_salle_id = $request->types_salle_id;
            $data->salle_id = $request->salle_id;
            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('sallesPs/index');
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
        $sallesps = SallesPs::FindOrFail($id);
        $typessalles = TypesSalles::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        $salles = Salles::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        return view('SallesPs.edit', compact('sallesps', 'typessalles', 'salles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(), [
            'prix' => 'required|gt:0',
            'titre' => 'required',
            'date1' => 'required|date',
            'date2' => 'required|date|after:date1',
        ]);

        if($validation->fails()){
            Toastr()->error('Veuillez remplir tous les champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = SallesPs::FindOrFail($id);

            $data->prix = $request->prix;
            $data->titre = $request->titre;
            $data->date1 = $request->date1;
            $data->date2 = $request->date2;
            $data->hotel_id = $request->user()->hotel_id;
            $data->types_salle_id = $request->types_salle_id;
            $data->salle_id = $request->salle_id;

            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('sallesPs/index');
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
        SallesPs::destroy($id);
        toastr()->success('Suppression éffectuée avec succès!');
        return redirect()->back();
    }
}
