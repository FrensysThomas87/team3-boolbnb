@extends('layouts.base')

@section('title', 'Search Apartment')

@section('content')

{{-- Advanced Search --}}

{{-- /Advanced Search --}}
<div class="main-search-container">
    <div class="search-content-left">
        <div class="filter-container">
            <div class="filter-content">
                <form action="">
                    {{-- Input numerici --}}
                    <div class="filter-properties">
                        <div>
                            <label for="rooms" >Stanze</label>
                            <input v-model="rooms" type="number" min="1" max="20" id="rooms" name="rooms">
                        </div>
                        <div>
                            <label for="beds">Letti</label>
                            <input v-model="beds" type="number" min="1" max="20"  id="beds" name="beds">
                        </div>
                    </div>
                    <hr>
                    {{-- Servizi --}}
                    <v-select class="service-input" multiple v-model="selectedServices" :options="services" placeholder="Servizi"></v-select>

                    {{-- Slider km --}}
                    <hr>
                    <div style="width: 100%">
                        <label for="range-km" class="label-km">Distanza</label>
                    </div>
                    <div class="km-range">
                        <span>0</span>
                        <input v-model='rangeKm' v-on:change="getApartments" type="range" class="form-range" min="1" max="50" step="1" id="range-km" >
                        </span>50</span>
                        <input class="cursor-distance" type="text" :value="rangeKm + ' ' + 'km'" disabled>
                    </div>

                </form>
            </div>
        </div>

            <apartments-component
            v-for="(apartment, index) in apartments"
            :key="apartment.id"
            v-if="filterVisible(apartment) && filterRooms(apartment) && filterBeds(apartment) && filterServices(apartment)"
            :apartments="apartment"
            v-on:send-index="activeIndex = index"
            v-on:active-main="active = true"
            v-on:apartment-id="apartmentId = apartment.id"
            v-on:disactive-message="formActive = false"
            v-on:add-view="addView(apartment.id)"
        />
    </div>
    <div class="search-content-right">
        <div v-if="noResults" class="error-message"> <h1>La ricerca non ha prodotto risultati</h1></div>
        {{-- Show appartamento --}}
        <div class="search-apartment-content" v-if="active">
            <show-component v-for="(apartment, index) in apartments" :key="index" v-if="index === activeIndex" :apartments="apartment"
            v-on:active-message="formActive = true"/>
        </div>
        <form action="{{route('message')}}" v-if="formActive && active" method="post">
            @csrf
            @method('POST')
            <input type="text" name="apartment_id" :value="apartmentId" hidden>
            <div class="form-group message-form">
                <label for="message_email">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" value="{{Auth::check()?$user->email:""}}"
                placeholder="Enter email" name="message_email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group message-form">
                <label for="message_title">Oggetto del messaggio</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Inserisci l'oggetto del messaggio"
                name="message_title">
                </div>
                <div class="form-group message-form">
                <label for="body_message">Testo del messaggio</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="body_message" placeholder="Scrivi il messaggio"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-default">Invia</button>
        </form>
    </div>
</div>

@endsection
