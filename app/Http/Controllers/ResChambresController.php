<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Chambres;
use App\Models\ChambresPr;
use App\Models\ChambresPs;
use App\Models\ResChambres;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ResChambresController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reschambres = ResChambres::where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','desc')->get();
        $clients = Clients::where('hotel_id','=',Auth::user()->hotel_id)->get();
        $chambres = Chambres::where('hotel_id','=',Auth::user()->hotel_id)->get();
        $chambresprs = ChambresPr::where('hotel_id','=',Auth::user()->hotel_id)->get();
        $chambrespss = ChambresPs::where('hotel_id','=',Auth::user()->hotel_id)->get();
        return view("ResChambres.index", compact('clients', 'chambres', 'chambresprs', 'chambrespss', 'reschambres'));
    }
    public function allData(){
        $data = ResChambres::where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','DESC')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reschambres = ResChambres::where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','DESC')->get();
        return view("ResChambres.create", compact('reschambres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeData(Request $request){
        $request->validate([
            'client_id' => 'required',
            'chambre_id' => 'required',
            'datedebut' => 'nullable',
            'datefin' => 'nullable',
            'option' => 'required',
            'occ' => 'nullable',
        ]);
         $store = ResChambres::insert([
            'client_id' => $request->client_id,
            'chambre_id' => $request->chambre_id,
            'dateres' => $request->dateres,
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'option' => $request->option,
            'occ' => $request->occ,
            'adultes' => $request->adultes,
            'enfants' => $request->enfants,
            'hotel_id' => $request->user()->hotel_id,
            'chambres_pr_id' => $request->chambres_pr_id,
            'chambres_ps_id' => $request->chambres_ps_id,
            'payement' => $request->payement,
            'statut' => $request->statut,
                 ]);

        return response()->json($store);
    }

    /**
     * Display the specified resource.
     */
    public function showData(string $id)
    {
        $todayDate = Carbon::now()->format('d-m-y');
        $client = Clients::all();
        $reschambre = ResChambres::findOrFail($id);
        return view('resChambres.show', compact('reschambre', 'client', 'todayDate'));
    }

    public function download($id)
    {
        $reschambre = ResChambres::findOrFail($id);
        $data = ['reschambre' => $reschambre];
        $todayDate = Carbon::now()->format('d-m-y');
        $pdf = Pdf::loadView('resChambres.show', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('facture-'.$reschambre->id.'-'.$todayDate.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editData($id){
        $data = ResChambres::findOrFail($id);
        return response()->json($data);
    }

    public function updateData(Request $request,$id){
        $request->validate([
            'client_id' => 'required',
            'chambre_id' => 'required',
            'datedebut' => 'nullable',
            'datefin' => 'nullable',
            'option' => 'required',
            'occ' => 'nullable',
        ]);

          $update = ResChambres::findOrFail($id)->update([
            'client_id' => $request->client_id,
            'chambre_id' => $request->chambre_id,
            'dateres' => $request->dateres,
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'option' => $request->option,
            'occ' => $request->occ,
            'adultes' => $request->adultes,
            'enfants' => $request->enfants,
            'hotel_id' => $request->user()->hotel_id,
            'chambres_pr_id' => $request->chambres_pr_id,
            'chambres_ps_id' => $request->chambres_ps_id,
            'payement' => $request->payement,
            'statut' => $request->statut,
                   ]);
           return response()->json($update);
}

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function deleteData($id){
        ResChambres::findOrFail($id)->delete();
        return response()->json('delete done');
    }
}
