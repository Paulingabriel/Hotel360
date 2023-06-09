<?php

namespace App\Http\Controllers;

use App\Models\Salles;
use App\Models\Chambres;
use App\Models\ResSalles;
use App\Models\ResChambres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newchambres = '';
        $newsalles = '';
        $reschambres = ResChambres::where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','desc')->get();
        $ressalles = ResSalles::where('hotel_id','=',Auth::user()->hotel_id)->orderBy('id','DESC')->get();
        $nbrchambres = Chambres::where('hotel_id','=',Auth::user()->hotel_id)->count(); 
        $chambresvd = ResChambres::where('hotel_id','=',Auth::user()->hotel_id)->count(); 
        $nbrsalles = Salles::where('hotel_id','=',Auth::user()->hotel_id)->count();
        $sallesvd = ResSalles::where('hotel_id','=',Auth::user()->hotel_id)->count();
        $chambres = Chambres::where('hotel_id','=',Auth::user()->hotel_id)->get();
        $salles = Salles::where('hotel_id','=',Auth::user()->hotel_id)->get();
        foreach($chambres as $chambre){
            $newchambres .=  $reschambres->where('chambre_id','=',$chambre->num)->first();
        };
        $newnbrchambres = explode('}', $newchambres);
        $chambresocp = (count($newnbrchambres)-1);

        foreach($salles as $salle){
            $newsalles .=  $ressalles->where('salle_id','=',$salle->num)->first();
        };
        $newnbrsalles = explode('}', $newsalles);
        $sallesocp = (count($newnbrsalles)-1);
        // $chambresocp = $reschambres->where('chambre_id','=',$chambres->num)->first(); 
        return view('accueil', compact('reschambres', 'ressalles', 'nbrchambres', 'nbrsalles', 'chambres',  'sallesocp', 'chambresocp', 'chambresvd', 'sallesvd'));
    }
}
