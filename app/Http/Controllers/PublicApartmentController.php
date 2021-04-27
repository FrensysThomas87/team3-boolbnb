<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Carbon\Carbon;

class PublicApartmentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Europe/Rome');
        $current_date = Carbon::now();
        $apartments = Apartment::with('sponsors')->get();
        /* $sponsoredApart = [];
        foreach ($apartments as $key => $apartment) {
            foreach ($apartment->sponsors as $key => $sponsor) {
                if ($sponsor->sponsor_expire > $sponsor_created) {
                    # code...
                }
            }
        } */
        return view('Apartments.index', compact('apartments'));
    }

     /**
     * Display the specified resource.
     *
     * @param  Apartment $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('Apartments.show', compact('apartment'));
    }

}


