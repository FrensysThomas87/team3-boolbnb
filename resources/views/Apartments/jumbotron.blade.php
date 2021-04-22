    {{-- Jumbotron --}}
    <div class="my-jumbotron-container">
        <div class="my-jumbotron" style="background-image: url({{asset('../img_app/jumbo2.jpeg')}})">
            @if (Route::is('index') || Route::is('public.apartments.index'))
                <div>
                    <h1><a href="{{route('search')}}">RICERCA APPARTAMENTO</a></h1>
                </div>
            @endif
            @if(Route::is('search'))
                <div class="my-search">
                    <div class="form-group my-search-form">
                        <input class="form-control" v-model="searchAddress" type="text" id="search" {{-- name="searchAddress" --}} placeholder="Inserisci indirizzo di ricerca" >
                        <button class="btn btn-dark" v-on:click="getApartments()" {{-- type="submit" --}}>Search</button>
                    </div>
                </div>
            @endif
        </div>
  </div>
  {{-- /Jumbotron --}}
