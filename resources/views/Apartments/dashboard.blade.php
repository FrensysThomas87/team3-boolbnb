@extends('layouts.base')

@section('title','Dashboard')

@section('content')


<table class="table">
    <thead class="thead-dark">

      <tr>
        <th scope="col">Titolo</th>
        <th scope="col">Dettagli</th>
            <th scope="col">
                 <a class="btn btn-light" href="{{route('apartments.create')}}" role="button">
                    Nuovo Appartamento
                    <i class="fas fa-plus"></i>
                </a>
            </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($apartments as $apartment)
                @if ($apartment->user_id === $user->id)
                <tr>
                    <td>{{$apartment->title}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('apartments.edit', ['apartment'=> $apartment->id])}}"><i class="fas fa-edit"></i></a>
                        <!-- Modal -->
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
                        <a class="btn btn-success" href="{{route('apartments.show', ['apartment'=> $apartment->id])}}" role="button"><i class="fas fa-info-circle"></i></a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{$apartment->id}}">
                            <i class="fas fa-bomb"></i>
                        </button>
                    </td>
                </tr>
                @endif
        @endforeach

    </tbody>
</table>


@endsection
