<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function store(Request $request){
        date_default_timezone_set('Europe/Rome');
        $data = $request->all();
        $message = new Message();
        $message->fill($data);
        $message->save();

        return redirect()->route('search');
    }
}
