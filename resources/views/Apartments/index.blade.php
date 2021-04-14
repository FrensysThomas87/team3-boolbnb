@extends('layouts.base')

@section('title', 'Index Apartment')

@section('content')


    {{-- <div class="main-content"> --}}
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Profile pic</th>
            <th scope="col">Address</th>




          </tr>
        </thead>
        <tbody>
          @foreach ($apartments as $apartment)
          <tr class="apartment-record">


            <td>{{$apartment->id}}</td>
            <td>{{$apartment->title}}</td>
            <td><img style="height: 100px" src="{{$apartment->profile_pic}}" alt=""></td>
            <td>{{$apartment->address}}</td>



          </tr>
          @endforeach
       </tbody>
     </table>
   {{-- </div> --}}


@endsection
