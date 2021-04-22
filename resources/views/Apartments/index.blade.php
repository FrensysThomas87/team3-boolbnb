@extends('layouts.base')

@section('title', 'Index Apartment')

@section('content')
<div class="container">
    {{-- <h1>Sponsored</h1> --}}
    <div class="container-card">

        @foreach ($apartments as $apartment)
        <div class="card">
            @if(!empty($apartment->profile_pic))
                <img class="card-img-top image-size" src="{{asset($apartment->profile_pic)}}" alt="Card image cap">

            @else
                <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="Card image cap">
            @endif

            <div class="card-body inline-block">
                <h1>{{$apartment->title}}</h1>
                <h4>€{{$apartment->price}},00</h4>
            </div>
        </div>
        @endforeach

    </div>
</div>




@endsection
