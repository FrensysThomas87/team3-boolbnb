<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Sponsor;
use Illuminate\Http\Request;
use Braintree;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function index(Request $request){
        $sponsor = $request->all();


        return view('Payments.index', compact('sponsor'));
    }


    public function process(Request $request)
    {

        $gateway = new Braintree\Gateway([
            'environment'=>'sandbox',
            'merchantId' => 'knftf637d9m5gckk',
            'publicKey'=> 'c7mtnrtrnj7npd6h',
            'privateKey'=>'3ba03019d1b0c3c65dd0cc1d6414c796'
        ]);

        $nonceFromTheClient = $request->payment_method_nonce;

        $results = $gateway->transaction()->sale([
        'amount' => $request['price'],
        'paymentMethodNonce' => $nonceFromTheClient,
        'options' => [
            'submitForSettlement' => True
        ]
        ]);

        //Creo data di scadenza
        date_default_timezone_set('Europe/Rome');
        $expiredDate= Carbon::now()->addHours($request['time']);
        //------------


        //inserisco nuovo sponsor se il risultato della transazione è andato a buonfine
        if ($results->success) {
            $sponsor = new Sponsor();
            $sponsor->sponsor_price = $request['price'];
            $sponsor->sponsor_type = $request['title'];
            $sponsor->sponsor_duration = $request['time'];
            $sponsor->sponsor_expire = $expiredDate;
            $sponsor->save();
        //--------------------------
        //collego il nuovo sponsor all'appartamento.
            $sponsorStored = Sponsor::orderBy('id','desc')->first();
            $getApartment = Apartment::find($request['apartment_id']);
            $getApartment->sponsors()->attach($sponsorStored->id);
        //-------------------------------------

            return redirect(route('public.apartments.show',['apartment'=>$request['apartment_id']]));
        }



    }
}
