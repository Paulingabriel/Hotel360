<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients= Clients::latest()->get();
        return view("clients.index", compact('clients' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'non' => 'required',
            'sexe' => 'required',
            'adresse' => 'required',
            'tel1' => 'required',
            'email' => 'required|email|unique:clients',
        ]);

        //dd($request);

        // if($validation->fails()){
        //     return redirect()
        //             ->back()
        //             ->withErrors( $validation)
        //             ->withInput();
        // }
        //dd($request);
        try{

            $data = new Clients();

            $data->nom = $request->nom;
            $data->sexe = $request->sexe;
            $data->adresse = $request->adresse;
            $data->email = $request->email;
            $data->tel1 = $request->tel1;
            $data->tel2 = $request->tel2;

            //dd($data);
            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('clients/index');
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
    public function edit($id)
    {
        $clients = Clients::FindOrFail($id);
        return view('clients.edit', compact('clients'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'non' => 'required',
            'sexe' => 'required',
            'adresse' => 'required',
            'tel1' => 'required',
            'email' => 'required|email',
        ]);

        // if($validation->fails()){
        //     return redirect()
        //             ->back()
        //             ->withErrors( $validation)
        //             ->withInput();
        // }


        try {

            $data = Clients::FindOrFail($id);

            $data->nom = $request->nom;
            $data->sexe = $request->sexe;
            $data->adresse = $request->adresse;
            $data->email = $request->email;
            $data->tel1 = $request->tel1;
            $data->tel2 = $request->tel2;
            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('clients/index');
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
        Clients::destroy($id);
        toastr()->success('Suppression éffectuée avec succès!');
        return redirect()->back();
    }
}
