@extends('layouts.base')


@section('title', 'Creazione Appartamento')


@section('content')
    <div class="container py-5">
        {{--Contenitore form --}}
        <div class="col-md-7 col-sm-12 form-container" style="margin: 0 auto;">
            <h1 style="color: #162e44;">Crea il tuo Appartamento</h1>
            @include('layouts.apartment.form', [$edit = false])
        </div>
    </div>

@endsection


