<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function index() {
        return view('Search.index');
    }

    public function getApartments(){

        $address = $_GET['address'];
        $km = $_GET['range'];
        $response = Http::withOptions(['verify' => false])->get('https://api.tomtom.com/search/2/geocode/' . $address . '.json?limit=1&key=cNjEbN63bx5Y0c7NfdNNKzoIkWdvYGsr')->json();
        $lat =$response['results'][0]['position']['lat'];
        $lon =$response['results'][0]['position']['lon'];

        $apartments = DB::select('SELECT *,
         ( 6371 * acos( cos( radians('.$lat.') ) * cos( radians( apartments.latitude ) )
            * cos( radians(apartments.longitude) - radians('.$lon.')) + sin(radians('.$lat.'))
            * sin( radians(apartments.latitude)))) AS distance
        FROM apartments
        HAVING distance <'. $km);



        return response()->json($apartments);
    }
}
