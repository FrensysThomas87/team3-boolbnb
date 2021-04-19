<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light" >
                <a class="navbar-brand" href="#">IdraBnB</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/apartments">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/">Welcome Page</a>
                    </li>
                    <li>
                      <a class="nav-link" href="{{route('search')}}">Booking</a>
                    </li>
                  </ul>
                  @if (!Auth::check())
                    <a class="btn btn-success" href="/login">Login</a>
                  @else
                    {{-- <div class="btn btn-danger" aria-labelledby="navbarDropdown">
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div> --}}
                    <ul class="navbar-nav left">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                                <span><i class="fas fa-user"></i></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">My Appartments</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>


                  @endif
                </div>
              </nav>
              <div class="my-jumbotron-container">
                    <div class="my-jumbotron" style="background-image: url({{asset('../img_app/jumbo.jpeg')}})">
                        @if (Route::is('apartments.index'))
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
        </header>

        @yield('content')
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
