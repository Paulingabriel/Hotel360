<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\TypesSalles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class TypesSallesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typessalles= TypesSalles::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        return view("typessalles.index", compact('typessalles' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("typesSalles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'titre' => 'required',
            'code' => 'required',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
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

            $data = new TypesSalles();

            $data->titre = $request->titre;
            $data->code = $request->code;
            $data->hotel_id = $request->user()->hotel_id;
            $data->description = $request->description;
            $data->min = $request->min;
            $data->max = $request->max;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = date('YmdHi') . ucfirst($request->titre) . '.' . $extension;
                $file->move('uploads/images/', $filename);
                $data->image = $filename;
            } else {
                $data->image = 'default.png';
            }
            $data->save();

            toastr()->success('Enregistrement éffectué avec succès!');
            return redirect()->route('typesSalles/index');
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
        $typessalles = TypesSalles::FindOrFail($id);
        return view('typesSalles.edit', compact('typessalles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'titre' => 'required',
            'code' => 'required',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp', 'max:5000'],
        ]);

        if($validation->fails()){
            return redirect()
                    ->back()
                    ->withErrors( $validation)
                    ->withInput();
        }


        try {

            $data = TypesSalles::FindOrFail($id);

            $data->titre = $request->titre;
            $data->code = $request->code;
            $data->hotel_id = $request->user()->hotel_id;
            $data->description = $request->description;
            $data->min = $request->min;
            $data->max = $request->max;

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

            $data->update();

            toastr()->success('Modification éffectuée avec succès!');
            return redirect()->route('typesSalles/index');
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
            $data = TypesSalles::findOrFail($id);
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
