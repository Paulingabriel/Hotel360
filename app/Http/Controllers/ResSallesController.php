<?php

namespace App\Http\Controllers;

use App\Models\Salles;
use App\Models\Clients;
use App\Models\SallesPr;
use App\Models\SallesPs;
use App\Models\ResSalles;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ResSallesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Clients::where('user_id','=',Auth::id())->get();
        $salles = Salles::where('user_id','=',Auth::id())->get();
        $sallesprs = SallesPr::where('user_id','=',Auth::id())->get();
        $sallespss = SallesPs::where('user_id','=',Auth::id())->get();
        return view("resSalles.index", compact('clients', 'salles', 'sallesprs', 'sallespss'));
    }
    public function allData(){
        $data = ResSalles::where('user_id','=',Auth::id())->orderBy('id','DESC')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ressalles = ResSalles::where('user_id','=',Auth::id())->orderBy('id','DESC')->get();
        return view("resSalles.create", compact('ressalles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeData(Request $request){
        $request->validate([
             'client_id' => 'required',
             'salle_id' => 'required',
             'datedebut' => 'required',
             'datefin' => 'required',
             'statut' => 'required',
        ]);
         $store = ResSalles::insert([
                'client_id' => $request->client_id,
                'salle_id' => $request->salle_id,
                'dateres' => $request->dateres,
                'datedebut' => $request->datedebut,
                'datefin' => $request->datefin,
                'user_id' => $request->user()->id,
                'salles_pr_id' => $request->salles_pr_id,
                'salles_ps_id' => $request->salles_ps_id,
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
        $ressalle = ResSalles::findOrFail($id);
        return view('resSalles.show', compact('ressalle'));
    }

    public function download($id){
        $ressalle = ResSalles::findOrFail($id);
        $data = ['ressalle' => $ressalle];
        $todayDate = Carbon::now()->format('d-m-y');
        $pdf = Pdf::loadView('resSalles.show', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('facture-'.$ressalle->id.'-'.$todayDate.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editData($id){
        $data = ResSalles::findOrFail($id);
        return response()->json($data);
    }

    public function updateData(Request $request,$id){
        $request->validate([
            'client_id' => 'required',
             'salle_id' => 'required',
             'datedebut' => 'required',
             'datefin' => 'required',
             'statut' => 'required',
        ]);

          $update = ResSalles::findOrFail($id)->update([
            'client_id' => $request->client_id,
            'salle_id' => $request->salle_id,
            'dateres' => $request->dateres,
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'user_id' => $request->user()->id,
            'salles_pr_id' => $request->salles_pr_id,
            'salles_ps_id' => $request->salles_ps_id,
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
        ResSalles::findOrFail($id)->delete();
        return response()->json('delete done');
    }
}
