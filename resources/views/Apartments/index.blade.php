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
            <th scope="col">
                @auth
                    <a class="btn btn-light" href="/apartments/create" role="button">ADD NEW ITEM</a>
                @endauth
            </th>




          </tr>
        </thead>
        <tbody>
          @foreach ($apartments as $apartment)
          <tr class="apartment-record">


            <td>{{$apartment->id}}</td>
            <td>{{$apartment->title}}</td>

            <td>
                @if(!empty($apartment->profile_pic))
                <img src="{{asset($apartment->profile_pic)}}" alt="Card image cap" style="height: 100px">
                 @else
                 <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="Card image cap" style="height: 100px">
                @endif
            </td>
            <td>
                {{$apartment->address}}
            </td>
            <td>
                <a class="btn btn-success" href="apartments/{{$apartment->id}}" role="button"><i class="fas fa-info-circle"></i></a>
                @auth
                <a class="btn btn-primary" href="admin/apartments/{{$apartment->id}}/edit"><i class="fas fa-edit"></i></a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{$apartment->id}}">
                    <i class="fas fa-bomb"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modal-{{$apartment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        SEI SICURO DI VOLER ELIMINARE IL PRODOTTO ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form class ="delete" action="{{route('apartments.destroy', ['apartment'=> $apartment->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" value="submit">DELETE</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                @endauth


            </td>



          </tr>
          @endforeach
       </tbody>
     </table>
   {{-- </div> --}}


@endsection
