@extends('layouts.base')

@section('title', 'Apartment-Show')





@section('content')
<div class="card" style="width: 14rem;">
    @if(!empty($apartment->profile_pic))
        <img class="card-img-top" src="{{asset($apartment->profile_pic)}}" alt="Card image cap">
    @else
        <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="Card image cap" style="height: 100px">
    @endif

    <div class="card-body">
        <h1>{{$apartment->title}}</h1>
        <p class="card-text">{{$apartment->description}}</p>
    </div>
</div>
@if (Auth::id()=== $apartment->user_id)
<div>
    <h1>Messaggi Appartmento</h1>
    @foreach ($apartment->messages as $message)
    <div>
        <h2>{{$message->message_title}}</h2>
        <h4>FROM: {{$message->message_email}}</h4>
        <p>
            <h4>Descrizione</h4>
            {{$message->body_message}}
        </p>
    </div>

    @endforeach
</div>
@endif
@endsection
