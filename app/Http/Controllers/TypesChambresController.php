<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypesChambresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("typesChambres.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("typeChambres.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nom' => 'required',
            'code' => 'required|unique:types_chambres',
            'description' => 'required',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'extra' => 'required|numeric',
            'enfants' => 'required|numeric',
            'prix' => 'required|numeric',
            'prixpersup' => 'required|numeric',
            'prixlitsup' => 'required|numeric',
            'image' => 'nullable'
        ]);

        if($validation->fails()){
            
            return redirect()
            ->back()
            ->withErrors( $validation)
            ->withInput();
        }

        try{

            $data = new TypesChambres();

            $data->nom = $request->nom;
            $data->code = $request->code;
            $data->description = $request->description;
            $data->min = $request->min;
            $data->max = $request->max;
            $data->extra = $request->extra;
            $data->enfants = $request->enfants;
            $data->prix = $request->prix;
            $data->prixpersup = $request->prixpersup;
            $data->prixlitsup = $request->prixlitsup;

            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $extension = $file->getClientOriginalExtension();
            //     $filename = date('YmdHi') . ucfirst($request->name) . '.' . $extension;
            //     $file->move('uploads/images/product/', $filename);
            //     $data->image = $filename;
            // } else {
            //     $data->image = 'default.png';
            // }
            $data->save();

            Toastr::success('Enregistrement reussit du produit : ' . $request->name);
            return redirect()->route('product.list');
        }
        catch{
            
            Toastr::error(
                "Echec d'enregistrement du consommable : " . $request->name
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
