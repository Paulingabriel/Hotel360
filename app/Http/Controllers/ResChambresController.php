<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Clients;
use App\Models\Chambres;
use App\Models\ChambresPr;
use App\Models\ChambresPs;
use App\Models\ResChambres;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class ResChambresController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {

        $todayDate = Carbon::now();
        $chambre = Chambres::with(['types_chambre', 'res_chambres'])->where('hotel_id','=',Auth::user()->hotel_id)->get();
        $reschambres = ResChambres::where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','desc')->get();
        $clients = Clients::where('hotel_id','=',Auth::user()->hotel_id)->get();
        $chambresprs = ChambresPr::where('hotel_id','=',Auth::user()->hotel_id)->get();
        $chambrespss = ChambresPs::where('hotel_id','=',Auth::user()->hotel_id)->get();
        return view("ResChambres.index", compact('clients', 'chambresprs', 'chambrespss', 'reschambres','chambre',   'todayDate'));
    }

    public function get(){
        $newchambres = [];
        $newchambre = [];
        $todayDate = Carbon::now();
        $chambre = Chambres::with(['types_chambre', 'res_chambres'])->where('hotel_id','=',Auth::user()->hotel_id)->get();
        foreach($chambre as $cham){
            // dd(isset($cham->res_chambres->last()->occ));
                if( isset($cham->res_chambres->last()->datefin) || isset($cham->res_chambres->last()->occ) ){
                    if(($cham->res_chambres->last()->datefin !== null && $cham->res_chambres->last()->datefin < $todayDate) || ( ( (((new DateTime($todayDate))->diff(new DateTime($cham->res_chambres->last()->dateres)))->days)*24 + (((new DateTime($todayDate))->diff(new DateTime($cham->res_chambres->last()->dateres)))->format('%h'))) > $cham->res_chambres->last()->occ)){
                        array_push($newchambres, $cham);
                    // dd($newchambres);
                    }
                }
                else{
                    array_push($newchambre, $cham);
                }
            };
        // dd($newchambres);
        $data = array_merge($newchambres, $newchambre);
        return response()->json($data);
    }

    public function allData(){
        $data = ResChambres::with('chambre')->where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','DESC')->get();
        return response()->json($data);
    }

    public function change($id){
        $data = Chambres::where('hotel_id','=',Auth::user()->hotel_id)->where('id','=',$id)->first()->types_chambre->chambres_pr;
        return response()->json($data);
    }

    public function editChange($id){
        
        $data = Chambres::where('hotel_id','=',Auth::user()->hotel_id)->where('id','=',$id)->first()->types_chambre->chambres_pr;
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

        $todayDate = Carbon::now();

        $request->validate([
            'client_id' => 'required',
            'chambre_id' => 'required',
            'datedebut' => 'nullable',
            'datefin' => 'nullable',
            'option' => 'required',
            'statut' => 'nullable',
            'occ' => 'nullable',
            'adultes' => 'required|gte:0',
            'enfants' => 'required|gte:0',
            'chambres_pr_id' => 'nullable',
        ]);
         $store = ResChambres::insert([
            'client_id' => $request->client_id,
            'chambre_id' => $request->chambre_id,
            'dateres' => $todayDate,
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'option' => $request->option,
            'occ' => $request->occ,
            'adultes' => $request->adultes,
            'enfants' => $request->enfants,
            'hotel_id' => $request->user()->hotel_id,
            'chambres_pr_id' => $request->chambres_pr_id,
            'total' => $request->total,
            'payement' => $request->payement,
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
        $newchambres = [];
        $newchambre = [];
        $todayDate = Carbon::now();
        $chambre = Chambres::with(['types_chambre', 'res_chambres'])->where('hotel_id','=',Auth::user()->hotel_id)->get();
        foreach($chambre as $cham){
            // dd();
                if((isset($cham->res_chambres->last()->datefin) || isset($cham->res_chambres->last()->occ)) ){
                    if(($cham->res_chambres->last()->datefin !== null && $cham->res_chambres->last()->datefin < $todayDate) || ( ( (((new DateTime($todayDate))->diff(new DateTime($cham->res_chambres->last()->dateres)))->days)*24 + (((new DateTime($todayDate))->diff(new DateTime($cham->res_chambres->last()->dateres)))->format('%h'))) > $cham->res_chambres->last()->occ)){
                        array_push($newchambres, $cham);
                    // dd($newchambres);
                    }
                }
                else{
                    array_push($newchambre, $cham);
                }
            }
        $datas = array_merge($newchambres, $newchambre);
        $data = ResChambres::findOrFail($id);
        $num = Chambres::where('id','=',$data->chambre_id)->first()->num;
        // dd($num);
        return response()->json(['data' => $data, 'datas' => $datas, 'num' => $num]);
    }

    public function updateData(Request $request,$id){

        $todayDate = Carbon::now();

        $request->validate([
            'client_id' => 'required',
            'chambre_id' => 'required',
            'datedebut' => 'nullable',
            'datefin' => 'nullable',
            'option' => 'required',
            'occ' => 'nullable',
            'adultes' => 'required|gte:0',
            'enfants' => 'required|gte:0',
            'chambres_pr_id' => 'nullable',
        ]);
          $update = ResChambres::findOrFail($id)->update([
            'client_id' => $request->client_id,
            'chambre_id' => $request->chambre_id,
            'dateres' => $todayDate,
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'option' => $request->option,
            'occ' => $request->occ,
            'adultes' => $request->adultes,
            'enfants' => $request->enfants,
            'hotel_id' => $request->user()->hotel_id,
            'chambres_pr_id' => $request->chambres_pr_id,
            'total' => $request->total,
            'payement' => $request->payement,
                   ]);
            // dd($request);
            // $data = Chambres::findOrFail($request->chambre_id);
            // if($request->statut == "Terminée"){
            //     $data->active = 1;
            // }else{
            //     $data->active = 0;
            // }
            // $data->update(['active' => $data->active]);
           return response()->json($update );
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
