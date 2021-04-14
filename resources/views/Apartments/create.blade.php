@extends('layouts.base')


@section('title', 'Creazione Appartamento')


@section('content')
    @include('layouts.apartment.form', [$edit = false])
@endsection


