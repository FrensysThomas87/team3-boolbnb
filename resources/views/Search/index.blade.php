@foreach ($apartments as $apartment)

    <ul>
        <li>{{$apartment->address}}</li>
    </ul>
@endforeach
