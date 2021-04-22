<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $message = new Message();
        $message->fill($data);
        $message->save();

        return redirect()->route('search');
    }
}
