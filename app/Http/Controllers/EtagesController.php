<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Etages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EtagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $etages= Etages::where('user_id','=',Auth::id())->latest()->get();
        return view("etages.index", compact('etages' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("etages.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'num' => 'required',
            'description' => 'nullable',
        ]);

        //dd($request);

        if($validation->fails()){
            toastr()->error('Veuillez remplir tous les champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }

        try{

            $data = new Etages();

            $data->num = $request->num;
            $data->active = $request->active == 'on' ? 0 : 1;
            $data->description = $request->description;
            $data->user_id = $request->user()->id;

            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('etages/index');
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
        $etages = Etages::FindOrFail($id);
        return view('etages.edit', compact('etages'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'num' => 'required',
            'description' => 'nullable',
        ]);

        if($validation->fails()){
            toastr()->error('Veuillez remplir tous les champs.');
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = Etages::FindOrFail($id);

            $data->num = $request->num;
            $data->active = $request->active;
            $data->user_id = $request->user()->id;
            $data->active = $request->active == 'on' ? 0 : 1;

            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('etages/index');
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
        Etages::destroy($id);
        toastr()->success('Suppression éffectuée avec succès!');
        return redirect()->back();
    }
}
