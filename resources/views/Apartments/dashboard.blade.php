@extends('layouts.base')

@section('title','Dashboard')

@section('content')

    <div class="container py-5">
        <section id="admin-dash">
            <div class="row">
                <div class="col-md-8">
                  <p class="welcome"><span>Ciao</span> {{$user->name}},</p>
                  <h1 style="color: #162e44;">Benvenuto nella tua area riservata</h1>
                </div>
                <div class="col-md-4 big-btn-add-apt" style="vertical-align: middle;">
                    <a href="{{route('apartments.create')}}" class="btn btn-boolbnb big">aggiungi un appartamento&nbsp; <i class="fas fa-plus"></i></a>
                </div>
            </div>
        </section>

        <div class="user-apartments">
            <div class="table-responsive-sm ms_apartments-table">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          <th scope="col" style="color: #fff;">Data</th>
                          <th scope="col" style="color: #fff;">Foto</th>
                          <th scope="col" style="color: #fff;">Titolo</th>
                          <th scope="col" style="color: #fff;">Opzioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartments as $apartment)
                          @if ($apartment->user_id === $user->id)
                            <tr>
                              {{-- Data --}}
                              <th scope="row" class="ms_data">
                                <div class="apartment-icons">
                                  <i class="far fa-calendar-alt"></i>
                                </div>
                                {{$apartment->created_at->format('d/m/y H:i')}}
                              </th>
                              {{-- Foto Appartamento --}}
                              <td class="apartment-foto-block">
                                <div class="img-thumbnail">
                                    <div class="apartment-foto">
                                        <a href="{{route('apartments.show', ['apartment'=> $apartment->id])}}">
                                            @if(!empty($apartment->profile_pic))

                                                <img class="card-img-top image-size" src="{{asset($apartment->profile_pic)}}" alt="Card image cap" width="150px;">

                                            @else
                                                <img src="{{asset('/images/placeholder/casadefault.jpg')}}" alt="Card image cap" width="150px;">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                              </td>
                              {{-- Titolo Appartamento --}}
                              <td class="apartment-title">
                                <a href="{{route('apartments.show', ['apartment'=> $apartment->id])}}">{{$apartment->title}}</a>
                              </td>
                              {{-- Opzioni --}}
                              <td>
                                <a class="controls-btn normal" href="{{route('apartments.edit', ['apartment'=> $apartment->id])}}"><i class="far fa-edit"></i></a>
                                <!-- Modale Elimina -->
                                <div class="modal fade" id="modal-{{$apartment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cancellazione Appartamento</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Sei sicuro di voler cancellare questo appartamento?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                <form class ="delete" action="{{route('apartments.destroy', ['apartment'=> $apartment->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit" value="submit">Conferma</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="controls-btn delete" type="submit" data-toggle="modal" data-target="#modal-{{$apartment->id}}"><i class="fas fa-trash-alt"></i></a>
                              </td>
                            </tr>
                          @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
