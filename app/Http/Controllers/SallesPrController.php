<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Salles;
use App\Models\SallesPr;
use App\Models\TypesSalles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SallesPrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sallespr = SallesPr::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        return view("SallesPr.index", compact('sallespr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typessalles = TypesSalles::all();
        $salles = Salles::all();
        return view("SallesPr.create", compact('typessalles','salles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'prix' => 'required|gt:1',
        ]);

        if($validation->fails()){
            Toastr()->error('Veuillez remplir tous les champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }

        // dd($request);

        try{

            $data = new SallesPr();

            $data->prix = $request->prix;
            $data->hotel_id = $request->user()->hotel_id;
            $data->types_salle_id = $request->types_salle_id;
            $data->salle_id = $request->salle_id;
            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('sallesPr/index');
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
        $sallespr = SallesPr::FindOrFail($id);
        $typessalles = TypesSalles::all();
        $salles = Salles::all();
        return view('SallesPr.edit', compact('sallespr', 'typessalles', 'salles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'prix' => 'required|gt:1',
        ]);

        if($validation->fails()){
            toastr()->error('Veuillez remplir ces champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = SallesPr::FindOrFail($id);


            $data->prix = $request->prix;
            $data->hotel_id = $request->user()->hotel_id;
            $data->types_salle_id = $request->types_salle_id;
            $data->salle_id = $request->salle_id;

            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('sallesPr/index');
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
        SallesPr::destroy($id);
        toastr()->success('Suppression éffectuée avec succès!');
        return redirect()->back();
    }
}
