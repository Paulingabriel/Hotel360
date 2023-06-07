<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ChambresPr;
use App\Models\ChambresPs;
use Illuminate\Http\Request;
use App\Models\TypesChambres;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChambresPrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chambrespr = ChambresPr::where('user_id','=',Auth::id())->latest()->get();
        return view("chambresPr.index", compact('chambrespr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeschambres = TypesChambres::all();
        return view("chambresPr.create", compact('typeschambres'));
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
            'types_chambre_id' => 'required',
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

            $data = new ChambresPr();

            $data->prixsieste = $request->prixsieste;
            $data->prixheure = $request->prixheure;
            $data->prixnuitee = $request->prixnuitee;
            $data->user_id = $request->user()->id;
            $data->types_chambre_id = $request->types_chambre_id;
            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('chambresPr/index');
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
        $chambrespr = ChambresPr::FindOrFail($id);
        $typeschambres = TypesChambres::all();
        return view('ChambresPr.edit', compact('chambrespr', 'typeschambres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'prixsieste' => 'required|gt:1',
            'prixheure' => 'required|gt:1',
            'prixnuitee' => 'required|gt:1',
            'types_chambre_id' => 'required',
        ]);

        if($validation->fails()){
            toastr()->error('Veuillez remplir ces champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = ChambresPr::FindOrFail($id);


            $data->prixsieste = $request->prixsieste;
            $data->prixheure = $request->prixheure;
            $data->prixnuitee = $request->prixnuitee;
            $data->user_id = $request->user()->id;
            $data->types_chambre_id = $request->types_chambre_id;

            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('chambresPr/index');
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
        ChambresPr::destroy($id);
        toastr()->success('Suppression éffectuée avec succès!');
        return redirect()->back();
    }
}
