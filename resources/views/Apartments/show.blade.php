@extends('layouts.base')

@section('title', 'Apartment-Show')





@section('content')
<div class="card" style="width: 14rem;">
    @if(!empty($apartment->profile_pic))
        <img class="card-img-top" src="{{asset($apartment->profile_pic)}}" alt="Card image cap">
    @else
        <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="Card image cap" style="height: 100px">
    @endif

    <div class="card-body">
        <h1>{{$apartment->title}}</h1>
        <p class="card-text">{{$apartment->description}}</p>
        <a href="#" class="btn btn-primary">Edit</a>
    </div>
</div>
@endsection
