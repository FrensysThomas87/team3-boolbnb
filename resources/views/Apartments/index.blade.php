@extends('layouts.base')

@section('title', 'Index Apartment')

@section('content')

<h1>Sponsored</h1>
    <div style="width: 1200px; display: flex; flex-wrap: wrap; margin: 0 auto;">

        @foreach ($apartments as $apartment)
        <div class="card" style="width: 14rem; margin-bottom: 15px; margin-right: 15px;">
            @if(!empty($apartment->profile_pic))
                <img class="card-img-top" src="{{asset($apartment->profile_pic)}}" alt="Card image cap">
            @else
                <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="Card image cap" style="height: 100px">
            @endif

            <div class="card-body">
                <h1>{{$apartment->title}}</h1>
                <h4>€{{$apartment->price}},00</h4>
            </div>
        </div>
        @endforeach

    </div>



@endsection
