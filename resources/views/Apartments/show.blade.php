@extends('layouts.base')

@section('title', 'Apartment-Show')





@section('content')
    {{-- Show component --}}
    <div class="search-apartment-content" {{--v-if="active" --}}>
        <show-component apartments="apartment"
        v-on:send-bronze="bronzeSelect()"
        v-on:send-silver="silverSelect()"
        v-on:send-gold="goldSelect()"
        />
    </div>
    {{-- /Show component --}}



    {{-- Messaggi ricevuti dal proprietario --}}
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
    {{-- /Messaggi ricevuti dal proprietario --}}

@endsection
