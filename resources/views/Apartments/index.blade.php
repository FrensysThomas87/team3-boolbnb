@php

    use Carbon\Carbon;


    date_default_timezone_set('Europe/Rome');
    $current_date = Carbon::now();
    $apartmentsSponsored=[];
    $activeApartments=[];


    foreach($apartments as $apartment){
        if (count($apartment->sponsors) > 0) {
            $apartmentsSponsored[] = $apartment;
        }
    }

    foreach ($apartmentsSponsored as $key => $item) {
        foreach ($item->sponsors as $sponsor) {
            if ($sponsor->sponsor_expire > $current_date) {
                $activeApartments[]=$item;
            }
        }
    }
@endphp

@extends('layouts.base')

@section('title', 'Index Apartment')

@section('content')
<div class="container">
    {{-- <h1>Sponsored</h1> --}}
    <div class="container-card">
        <div class="content-card">
            @foreach ($activeApartments as $apartment)
            @if ($apartment->visible === 'true')
            <a href="{{route('public.apartments.show', ['apartment'=> $apartment->id])}}" style="text-decoration: none;">
                <div class="card">
                    @if(!empty($apartment->profile_pic))
                        <div class="img-container" style="background-image: url({{$apartment->profile_pic}})"></div>
                        {{-- <img class="card-img-top image-size" src="{{asset($apartment->profile_pic)}}" alt="Card image cap"> --}}

                    @else
                    <div class="img-container" style="background-image: url('/images/placeholder/casadefault.jpg')"></div>
                    {{-- <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="Card image cap"> --}}
                    @endif

                    <h1 class="color-text-dark text-left pr-3" style="margin-top: 10px; padding-left: 5px;">{{$apartment->title}}</h1>
                    <h4 class="color-text-dark text-right pr-3">€{{$apartment->price}},00</h4>

                </div>
            </a>
            @endif
            @endforeach
        </div>
    </div>

    <div class="pb-5">
        <div class="container-host ">

            <div class="container-changeLife">
            <div class="change-life">
                <div class="text-title">
                <h2 class="text-white">Diventa un HOST</h2>
                </div>
                <div class="line-text">
                <div class="line">

                </div>
                </div>
                <div class="text-subtitle">
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis minus, provident sapiente voluptas qui dolore omnis autem exercitationem mollitia. Quam, nisi quidem. Perferendis modi voluptates nostrum expedita ad inventore sint?</p>
                </div>
            </div>
            <div class="buttons-change-life">
                <a type="button" class="btn my-btn-primary" href="{{ route('register') }}">Scopri di più</a>

            </div>
            </div>

        </div>
    </div>

</div>




@endsection
