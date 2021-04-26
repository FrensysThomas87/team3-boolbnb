@extends('layouts.base')

@section('title', 'Apartment-Show')





@section('content')
    <div class="main-content-show">
{{-- <div class="apartment-box">

    <!-- Title + address -->
    <div class = "apartment-top">
        <h1 class="apartment-title">{{$apartment->title}}</h1>
        <h6 class="apartment-address"><i class="fas fa-map-marker-alt fa-lg"></i>{{$apartment->address}}</h6>
    </div>


     <div class="main-box">
         <!-- Box left -->
         <div class="main-box-left">
              <!-- Inserisci placeholder se immagine vuota -->
            <!-- <img class= "" style="width:300px;" src="/images/placeholder/casadefault.jpg" alt=""> -->
            <!-- <div class="pic-container"> -->
                @if($apartment->profile_pic)
                    <img src={{asset($apartment->profile_pic)}} alt="">
                @else
                    <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="">
                @endif

            <!-- </div> -->
         </div>

         <!-- Box right -->
         <div class="main-box-right">
            <!-- Mappa impostata su background div-->
         </div>


     </div>

    <div class="apartment-properties">
        <ul>
            <li><i class="fas fa-home fa-2x"></i></li>
            <li><span class="apartment-guests">{{$apartment->max_guests}} ospiti</span></li>
            <li><span class="apartment-rooms">{{$apartment->rooms}} camere</span></li>
            <li><span class="apartment-beds">{{$apartment->beds}} letti</span></li>
            <li><span class="apartment-baths">{{$apartment->baths}} bagni</span></li>
            <li><span class="apartment-mq">{{$apartment->sq_meters}}mq</span></li>
        </ul>
        <ul>
            <li class="apartment-check-in"><span><i class="far fa-clock fa-lg"></i> Check in: {{$apartment->check_in}}</span></li>
            <li class="apartment-check-out"><span><i class="fas fa-clock fa-lg"></i> Check out: {{$apartment->check_out}}</span></li>
        </ul>
    </div>
    <!-- <div class="apartment-user">
        <i class="fas fa-user fa-2x"></i>
        <span>User name, surname</span>

    </div> -->

    <!-- <div class="apartment-check-in"> -->

    <div class="apartment-description">
        <h2>Description</h2>
        <p>{{$apartment->description}}</p>
    </div>
    <!-- </div> -->



    <div class="apartment-services">
        <h2>Services</h2>
        <ul>
            <li><i class="far fa-dot-circle"></i> Wifake </li>
            <li><i class="far fa-dot-circle"></i> Animali fake</li>
            <li><i class="far fa-dot-circle"></i> Colazione fake</li>
            <li><i class="far fa-dot-circle"></i> Cancellazione prenotazione gratuita</li>
        </ul>
    </div>

    <div class="apartment-booking">
        <h2><i class="fas fa-tag"></i> Prezzo: {{$apartment->price}}€ /notte</h2>
        <h2><i class="far fa-eye"></i> Visualizzazioni: {{$apartment->view_count}} </h2>
    </div>

</div> --}}



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
            <!-- Mappa - background img su CSS -->
         </div>
     </div>

    <!-- Proprietà appartamento -->
    <div class="apartment-properties">
        <!-- Lista proprietà appartamento -->
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

    <!-- Proprietario appartamento -->
    <!-- <div class="apartment-user">
        <i class="fas fa-user fa-2x"></i>
        <span>User name, surname</span>

    </div> -->


    <!-- Descrizione appartamento -->
    <div class="apartment-description">
        <h2>Description</h2>
        <p>{{$apartment->description}}</p>
    </div>



    <!-- Servizi appartamento -->
    <div class="apartment-services">
        <h2>Services</h2>
        {{-- <ul>
            <li v-for="service in $apartment->services">
                <i class="far fa-dot-circle"></i>
                <span> {{service.service_name}}</span>
            </li>

        </ul> --}}
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
