@extends('layouts.base')

@section('title', 'Search Apartment')

@section('content')
<div class="filter-container">
    <div class="filter-content">
        <form action="">
            <label for="rooms">N° Rooms</label>
            <input v-model="rooms" type="text" id="rooms" name="rooms">
            <label for="beds">N°Letti</label>
            <input v-model="beds" type="text"  id="beds" name="beds">
            <v-select multiple v-model="selectedServices" :options="services"></v-select>
            {{-- <div>
                <search-component v-model="selectedServices" :services="services" />
            </div> --}}
            <div class="km-range">
                <label for="range-km" class="form-label">Km Distance</label>
                <input v-model='rangeKm' type="range" class="form-range" min="1" max="50" step="1" id="range-km">
                <input type="text" :value="rangeKm" disabled>
            </div>
        </form>
    </div>
</div>
        {{-- VUE ADVANCED SEARCH BOX --}}
        {{-- div app definito in layout base --}}

        {{-- Address --}}

        {{-- Filtri --}}
            {{-- N. stanze --}}

            {{-- N. letti --}}

            {{-- Servizi aggiuntivi --}}

        {{-- Km range slider --}}



        {{-- /VUE ADVANCED SEARCH BOX --}}


        {{-- LEFT SIDEBAR --}}
       {{--  <ul style="list-style:none">
            @foreach ($apartments as $apartment)
            <li>
                <div class="card" style="width: 14rem;">
                @if(!empty($apartment->profile_pic))
                    <img class="card-img-top" src="{{asset($apartment->profile_pic)}}" alt="Card image cap">
                @else
                    <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="Card image cap" style="height: 100px">
                @endif

                    <div class="card-body">
                        <h1>{{$apartment->title}}</h1>
                        <p class="card-text">{{$apartment->address}}</p>
                        <a href="#" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul> --}}
        {{-- /LEFT SIDEBAR --}}

        {{-- MAIN BOX --}}


        {{-- /MAIN BOX --}}

    {{-- /App --}}

@endsection
