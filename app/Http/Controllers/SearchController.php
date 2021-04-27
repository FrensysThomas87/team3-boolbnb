<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index() {

        $user = Auth::user();
        return view('Search.index', compact('user'));
    }

    public function getApartments(){

        $address = $_GET['address'];
        $km = $_GET['range'];
        $response = Http::withOptions(['verify' => false])
            ->get('https://api.tomtom.com/search/2/geocode/' . $address . '.json?limit=1&key=cNjEbN63bx5Y0c7NfdNNKzoIkWdvYGsr')
            ->json();
        $lat =$response['results'][0]['position']['lat'];
        $lon =$response['results'][0]['position']['lon'];


        //Creata query con le funzioni di eloquent
        //Richiamata la tabella Apartment con l'aggiunta dei servizi (with)
        $apartments = Apartment::with('services')
        ->select(Apartment::raw('*, ( 6371 * acos( cos( radians('.$lat.') ) * cos( radians(apartments.latitude) )
        * cos( radians(apartments.longitude) - radians('.$lon.')) + sin(radians('.$lat.'))
        * sin( radians(apartments.latitude)))) AS distance'))
        ->having('distance','<', $km)
        ->get();

        return response()->json($apartments);
    }

    public function addView(Request $request){
        $apartment = Apartment::find($request->id);
        $apartment->view_count += 1 ;
        $apartment->save();
    }
}




