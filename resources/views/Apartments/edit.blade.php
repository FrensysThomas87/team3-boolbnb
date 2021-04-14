@extends('layouts.base')


@section('title', 'Modifica Appartamento')


@section('content')
    @include('layouts.apartment.form', [$edit = true])
@endsection

