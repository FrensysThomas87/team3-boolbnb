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
                <input v-model='rangeKm' v-on:change="getApartments" type="range" class="form-range" min="1" max="50" step="1" id="range-km">
                <input type="text" :value="rangeKm" disabled>
            </div>
        </form>
    </div>
</div>
<div class="main-search-container">
    <div class="search-content-left">
            <apartments-component
            v-for="(apartment, index) in apartments"
            :key="apartment.id"
            v-if="filterVisible(apartment) && filterRooms(apartment) && filterBeds(apartment) && filterServices(apartment)"
            :apartments="apartment"
            v-on:send-index="activeIndex = index"
            v-on:active-main="active = true"
            v-on:apartment-id="apartmentId = apartment.id"
            />
    </div>
    <div class="search-content-right">
            <div class="search-apartment-content" v-if="active">
                <show-component v-for="(apartment, index) in apartments" :key="index" v-if="index === activeIndex" :apartments="apartment"/>
            </div>
            <form action="{{route('message')}}" v-if="active" method="post">
                @csrf
                @method('POST')

                <input type="text" name="apartment_id" :value="apartmentId" hidden>
                <input type="text" name="message_email" value="{{Auth::check()?$user->email:""}}" placeholder="Inserici Email">
                <input type="text" name="message_title" placeholder="Oggetto Messaggio">
                <div>
                    <textarea type="text" name="body_message" placeholder="Messaggio" row="6"></textarea>
                </div>
                <button type="submit">Invia</button>
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
