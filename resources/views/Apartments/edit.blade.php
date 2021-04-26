@extends('layouts.base')


@section('title', 'Modifica Appartamento')


@section('content')
    <div class="container py-5">
        <h1 class="edit-apartment-heading">Aggiorna l'appartamento</h1>
        <p class="edit-apartment-title">{{$apartment->title}}</p>
        <div class="apartment-edit-container">
            <div class="row">
                <div class="col-md-5">
                    <div class="edit-this-apartment">
                        {{-- Foto --}}
                        <div class="edit-apartment-foto">
                            @if(!empty($apartment->profile_pic))
                                <img class="card-img-top image-size" src="{{asset($apartment->profile_pic)}}" alt="Card image cap">
                            @else
                                <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="Card image cap">
                            @endif
                        </div>
                        {{-- Info Appartamento --}}
                        <div class="edit-apartment-info">
                            <div class="edit-apartment-row">
                                <div class="edit-column left">Indirizzo</div>
                                <div class="edit-column right">{{$apartment->address}}</div>
                            </div>
                            <div class="edit-apartment-row">
                                <div class="edit-column left">Prezzo a notte</div>
                                <div class="edit-column right"> <span>{{$apartment->price}} €</span> </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contenitore form --}}
                <div class="col-md-7 col-sm-12 form-container">
                    @include('layouts.apartment.form', [$edit = true])
                </div>
            </div>
        </div>
    </div>
@endsection

