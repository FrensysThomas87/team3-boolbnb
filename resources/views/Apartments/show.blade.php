@php
use Carbon\Carbon;

$sponsoredArray=[];
date_default_timezone_set('Europe/Rome');
$current_date = Carbon::now();
foreach ($apartment->sponsors as $key => $sponsor) {
    if ($sponsor->sponsor_expire > $current_date) {
        $sponsoredArray[]= $sponsor;
    };
}
@endphp

@extends('layouts.base')

@section('title', 'Apartment-Show')





@section('content')
<div class="main-content-show">
    <div class="apartment-box">

        <!-- Title + address -->
        <div class = "apartment-top">
            <h1 class="apartment-title">{{$apartment->title}}</h1>
            <h6 class="apartment-address"><i class="fas fa-map-marker-alt fa-lg"></i>{{$apartment->address}}</h6>

        </div>

        <!-- Immagine appartamento + mappa -->
        <div class="main-box">
            <!-- Box left -->
            <div class="main-box-left">
                <!-- Immagine appartamento -->
                @if($apartment->profile_pic)
                <img src={{asset($apartment->profile_pic)}} alt="">
                @else
                <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="">
                @endif
            </div>

            <!-- Box right -->
            <div class="main-box-right">
                <!-- Mappa -->
                <img
                    class="map-search"
                    src = "https://api.tomtom.com/map/1/staticimage?layer=basic&style=main&format=png&zoom=14&center={{$apartment->longitude}}%2C%20{{$apartment->latitude}}&width=658&height=400&view=Unified&key=cNjEbN63bx5Y0c7NfdNNKzoIkWdvYGsr"
                >
            </div>
        </div>

        <!-- Proprietà appartamento -->
        <div class="apartment-properties">
            <!-- Lista proprietà appartamento -->
            <div>
                <ul>
                    <li><i class="fas fa-home fa-2x"></i></li>
                    <li><span class="apartment-guests">{{$apartment->max_guests}} ospiti</span></li>
                    <li><span class="apartment-rooms">{{$apartment->rooms}} camere</span></li>
                    <li><span class="apartment-beds">{{$apartment->beds}} letti</span></li>
                    <li><span class="apartment-baths">{{$apartment->baths}} bagni</span></li>
                    <li><span class="apartment-mq">{{$apartment->sq_meters}}mq</span></li>
                </ul>

                <!-- Check in - orari -->
                <ul>
                    <li class="apartment-check-in"><span><i class="far fa-clock fa-lg"></i> Check in: {{$apartment->check_in}}</span></li>
                    <li class="apartment-check-out"><span><i class="fas fa-clock fa-lg"></i> Check out: {{$apartment->check_out}}</span></li>
                </ul>
            </div>
            <ul>
                @if (count($sponsoredArray) > 0 && Auth::id() === $apartment->user_id)
                <li class="badge-sponsor">
                    <div>
                        <i class="fas fa-medal"></i>
                    </div>
                    <div>
                       <b> Il tuo sponsor scade il</b><br><i>{{date("d-m-Y",strtotime($sponsoredArray[0]->sponsor_expire))}}</i>
                    </div>
                </li>
                @endif
                @if (count($sponsoredArray) < 1 && Auth::id()=== $apartment->user_id)
                <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-sponsor">
                        Sponsorizza
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-sponsor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><b>Acquista Sponsor</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <b>Seleziona uno Sponsor</b>
                                </div>
                                <div  class="sponsor-container "style="display:flex; justify-content:center">
                                    <button v-bind:class="activeBronze?'sponsor-active':'sponsor-button'" v-on:click="bronzeSelect(), bronzeClassIn()">
                                        <form id="bronze" action="{{route('payment')}}" method="post">
                                            @csrf
                                            @method('POST')
                                            <h3>Bronze</h3>
                                            <h4><i class="fas fa-medal" style="color: #cd7f32"></i></h4>
                                            <h5>Costo: 2,99€</h5>
                                            <h5>Durata: 24H</h5>
                                            <input type="hidden" value="24" name="time">
                                            <input type="hidden" value="2.99" name="price">
                                            <input type="hidden" value="bronze" name="title">
                                            <input type="hidden" value="{{$apartment->id}}" name="apartment_id">
                                        </form>
                                    </button>
                                    <button v-bind:class="activeSilver?'sponsor-active':'sponsor-button'" v-on:click ="silverSelect(), silverClassIn()" style="margin-right:15px; margin-left: 15px;">
                                        <form id="silver" action="{{route('payment')}}" method="post">
                                            @csrf
                                            @method('POST')
                                            <h3>Silver</h3>
                                            <h4><i class="fas fa-medal" style="color:silver"></i></h4>
                                            <h5>Costo: 5,99€</h5>
                                            <h5>Durata: 72H</h5>
                                            <input type="hidden" value="72" name="time">
                                            <input type="hidden" value="5.99" name="price">
                                            <input type="hidden" value="silver" name="title">
                                            <input type="hidden" value="{{$apartment->id}}" name="apartment_id">
                                        </form>
                                    </button>
                                    <button v-bind:class="activeGold?'sponsor-active':'sponsor-button'" v-on:click="goldSelect(),goldClassIn()">
                                        <form id="gold" action="{{route('payment')}}" method="post">
                                            @csrf
                                            @method('POST')
                                            <h3>Gold</h3>
                                            <h4><i class="fas fa-medal" style="color:gold"></i></h4>
                                            <h5>Costo: 9,99€</h5>
                                            <h5>Durata: 144H</h5>
                                            <input type="hidden" value="144" name="time">
                                            <input type="hidden" value="9.99" name="price">
                                            <input type="hidden" value="Gold" name="title">
                                            <input type="hidden" value="{{$apartment->id}}" name="apartment_id">
                                        </form>
                                    </button>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                    <form class ="delete" action="" method="POST">
                                        <button class="btn btn-success" type="button" href="{{route('payment')}}" v-on:click="submitSponsor(flagSponsor)">Vai al Pagamento</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endif
            </ul>
        </div>

        <!-- Proprietario appartamento -->
        <!-- <div class="apartment-user">
            <i class="fas fa-user fa-2x"></i>
            <span>User name, surname</span>

        </div> -->


        <!-- Descrizione appartamento -->
        <div class="apartment-description">
            <h2>Descrizione</h2>
            <p>{{$apartment->description}}</p>
        </div>



        <!-- Servizi appartamento -->
        <div class="apartment-services">
            <h2>Servizi</h2>
            <ul>
                @foreach($apartment->services as $service)
                <li>
                    <i class="far fa-dot-circle"></i>
                    <span> {{$service->service_name}}</span>
                </li>
                @endforeach
            </ul>
        </div>

        <!-- Prezzo appartamento -->
        <div class="apartment-booking">
            <h2><i class="fas fa-tag"></i> Prezzo: {{$apartment->price}}€ /notte</h2>
            <!-- <h2><i class="far fa-eye"></i> Visualizzazioni: {{$apartment->view_count}} </h2> -->
        </div>

    </div>





    {{-- Messaggi ricevuti dal proprietario --}}
    @if (Auth::id()=== $apartment->user_id)
    <div class="apartment-messages">
        <h2>Messaggi Ricevuti</h2>
        @foreach ($apartment->messages as $message)
        <div class="msg-received rounded">
            <h3>Oggetto: {{$message->message_title}}</h3>
            <h5>Da: {{$message->message_email}}</h5>
            <h5>Ricevuto il: {{date('d-m-Y H:i', strtotime($message->created_at))}}</h5>
            <hr>
            <p>{{$message->body_message}}</p>
        </div>

        @endforeach
    </div>
    @endif
    {{-- /Messaggi ricevuti dal proprietario --}}
</div>
{{-- /Main Content --}}
@endsection
