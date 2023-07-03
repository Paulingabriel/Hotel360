<?php

namespace App\Http\Controllers;

use DateTime;
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
        $todayDate = Carbon::now();
        $clients = Clients::where('hotel_id','=',Auth::user()->hotel_id)->get();
        $salles = Salles::with(['types_salle', 'res_salles'])->where('hotel_id','=',Auth::user()->hotel_id)->where('active','=',1)->get();
        $ressalles = ResSalles::where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','desc')->get();
        $sallesprs = SallesPr::where('hotel_id','=',Auth::user()->hotel_id)->get();
        $sallespss = SallesPs::where('hotel_id','=',Auth::user()->hotel_id)->get();
        
        return view("resSalles.index", compact('clients', 'salles', 'sallesprs', 'sallespss'));
    }

    public function get(){
        $newsalles = [];
        $newsalle = [];
        $todayDate = Carbon::now();
        $salle = Salles::with(['types_salle', 'res_salles'])->where('hotel_id','=',Auth::user()->hotel_id)->get();
        foreach($salle as $sall){
            // dd(isset($sall->res_salles->last()->occ));
                if( isset($sall->res_salles->last()->datefin) ){
                    if(($sall->res_salles->last()->datefin !== null && $sall->res_salles->last()->datefin < $todayDate)){
                        array_push($newsalles, $sall);
                    // dd($newsalles);
                    }
                }
                else{
                    array_push($newsalle, $sall);
                }
            };
        // dd($newsalles);
        $data = array_merge($newsalles, $newsalle);
        return response()->json($data);
    }

    public function allData(){
        $data = ResSalles::with('salle')->where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','DESC')->get();
        return response()->json($data);
    }

    public function change($id){
        $data = Salles::where('hotel_id','=',Auth::user()->hotel_id)->where('id','=',$id)->first()->types_salle->salles_pr;
        return response()->json($data);
    }

    public function editChange($id){
        
        $data = Salles::where('hotel_id','=',Auth::user()->hotel_id)->where('id','=',$id)->first()->types_salle->salles_pr;
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ressalles = ResSalles::where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','DESC')->get();
        return view("resSalles.create", compact('ressalles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeData(Request $request){
        

        $todayDate = Carbon::now();

        $request->validate([
             'client_id' => 'required',
             'salle_id' => 'required',
             'datedebut' => 'required',
             'datefin' => 'required',
        ]);
         $store = ResSalles::insert([
                'client_id' => $request->client_id,
                'salle_id' => $request->salle_id,
                'dateres' => $todayDate,
                'datedebut' => $request->datedebut,
                'datefin' => $request->datefin,
                'hotel_id' => $request->user()->hotel_id,
                'salles_pr_id' => $request->salles_pr_id,
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
        $ressalle = ResSalles::findOrFail($id);
        $client = Clients::where('hotel_id','=',Auth::user()->hotel_id)->latest()->get();
        $todayDate = Carbon::now()->format('d-m-y');
        return view('resSalles.show', compact('ressalle', 'client',  'todayDate'));
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
        $newsalles = [];
        $newsalle = [];
        $todayDate = Carbon::now();
        $salle = Salles::with(['types_salle', 'res_salles'])->where('hotel_id','=',Auth::user()->hotel_id)->get();
        foreach($salle as $sall){
            // dd(isset($sall->res_salles->last()->occ));
                if( isset($sall->res_salles->last()->datefin) ){
                    if(($sall->res_salles->last()->datefin !== null && $sall->res_salles->last()->datefin < $todayDate)){
                        array_push($newsalles, $sall);
                    // dd($newsalles);
                    }
                }
                else{
                    array_push($newsalle, $sall);
                }
            };
        // dd($newsalles);
        $datas = array_merge($newsalles, $newsalle);
        $data = ResSalles::findOrFail($id);
        $num = Salles::where('id','=',$data->salle_id)->first()->num;
        return response()->json(['data' => $data, 'datas' => $datas, 'num' => $num]);
    }

    public function updateData(Request $request,$id){

        $todayDate = Carbon::now();

        $request->validate([
            'client_id' => 'required',
             'salle_id' => 'required',
             'datedebut' => 'required',
             'datefin' => 'required',
        ]);
          $update = ResSalles::findOrFail($id)->update([
            'client_id' => $request->client_id,
            'salle_id' => $request->salle_id,
            'dateres' => $todayDate,
            'datedebut' => $request->datedebut,
            'datefin' => $request->datefin,
            'hotel_id' => $request->user()->hotel_id,
            'salles_pr_id' => $request->salles_pr_id,
            'total' => $request->total,
            'payement' => $request->payement,
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
