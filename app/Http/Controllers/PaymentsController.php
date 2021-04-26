<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree;

class PaymentsController extends Controller
{
    public function index(Request $request){

        return view('Payments.index');
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
        'amount' => '10.00',
        'paymentMethodNonce' => $nonceFromTheClient,
        'options' => [
            'submitForSettlement' => True
        ]
        ]);
        return redirect(route('index'));
    }
}
