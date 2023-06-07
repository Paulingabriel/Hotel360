<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Etages;
use App\Models\Chambres;
use App\Models\ResChambres;
use Illuminate\Http\Request;
use App\Models\TypesChambres;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChambresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chambres = Chambres::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        $reschambre = ResChambres::get();
        return view("chambres.index", compact('chambres', 'reschambre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeschambres = TypesChambres::all();
        $etages = Etages::all();
        return view("chambres.create", compact('typeschambres','etages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'num' => 'required|gt:0',
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

            $data = new Chambres();

            $data->num = $request->num;
            $data->types_chambre_id = $request->types_chambre_id;
            $data->etage_id = $request->etage_id;
            $data->hotel_id = $request->user()->hotel_id;
            $data->active = $request->active == 'on' ? 0 : 1;
            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('chambres/index');
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
        $chambres = Chambres::FindOrFail($id);
        $typeschambres = TypesChambres::all();
        $etages = etages::all();
        return view('chambres.edit', compact('chambres', 'typeschambres', 'etages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'num' => 'required|gt:0',
        ]);

        if($validation->fails()){
            toastr()->error('Veuillez remplir ces champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = Chambres::FindOrFail($id);


            $data->num = $request->num;
            $data->types_chambre_id = $request->types_chambre_id;
            $data->etage_id = $request->etage_id;
            $data->hotel_id = $request->user()->hotel_id;
            $data->active = $request->active == 'on' ? 0 : 1;


            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('chambres/index');
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
        Chambres::destroy($id);
        toastr()->success('Suppression éffectuée avec succès!');
        return redirect()->back();
    }
}
