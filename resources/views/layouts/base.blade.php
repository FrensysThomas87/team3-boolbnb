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
        <header >
            {{-- Navbar --}}
            <nav class="navbar navbar-expand-lg navbar-light my-navbar fixed-top" :class="status ? 'bg-trnsprt':'bg-blue'">
                <div class="position-relative" :class="scaleLogoHeader ? 'scale-logo' : 'no-scale-logo'">
                    <a href="{{route('index')}}" class="my-brand">
                      <span>B</span>
                      <span class="text-danger">
                        <i class="fas fa-map-marker-alt"></i>
                        <i class="fas fa-map-marker-alt"></i>
                      </span>
                      <span class="lbnb">LBNB</span>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto align-items-end">
                    <li class="nav-item active">
                        <div class="position-relative">
                            <a class="my-link text-white" href="{{route('index')}}">Home <span class="sr-only"></span></a>
                        </div>

                    </li>
                    <li>
                        <div class="position-relative">
                            <a class="my-link text-white" href="{{route('search')}}">Cerca</a>
                        </div>

                    </li>
                  </ul>
                  <ul class="navbar-nav align-items-end" style="padding: 0rem 0.9rem;">
                      <li>
                        @if (!Auth::check())
                            <div>
                                <a class="btn btn-primary align-items-end" href="/login">
                                    Accedi
                                    <i class="fas fa-sign-in-alt"></i>

                                </a>
                            </div>

                        @else

                      </li>
                  </ul>


                    {{-- LOGIN --}}
                    <ul class="navbar-nav left align-items-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                                <span class="my-username"><i class="fas fa-user text-white"></i></span>
                            </a>
                            <div class="dropdown-menu my-dropdown" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-dark" href="#">Profilo</a>
                                <a class="dropdown-item text-dark" href="{{route('dashboard')}}">I miei appartamenti</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Esci') }}
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    {{-- /LOGIN --}}


                  @endif
                </div>
              </nav>
              {{-- /Navbar --}}

              {{-- Jumbotron --}}
              @if (Route::is('home') || Route::is('index')|| Route::is('search') )
                <div class="my-jumbotron-container">
                        <div class="my-jumbotron" style="background-image: url({{asset('../img_app/jumbo3.jpeg')}})">

                            @if (Route::is('index') || Route::is('public.apartments.index'))
                                <div>

                                </div>
                            @endif
                            @if(Route::is('search') || Route::is('index') )
                                <div class="my-search">
                                    <div class="form-group my-search-form mt-5 mb-5 mr-2 ml-2">

                                        <input class="form-control" v-on:keyup.enter="getApartments(), noResults = true" v-model="searchAddress" type="text" id="search" {{-- name="searchAddress" --}} placeholder="La tua prossima destinazione">
                                        <button type="submit" class="btn btn-search btn btn-primary" v-on:click="getApartments()">
                                            Cerca
                                        </button>
                                        <div v-if="apartments.length === 0 && noResults === true" class="no-results">La ricerca non ha prodotto risultati</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                </div>
              @endif

              {{-- /Jumbotron --}}
        </header>

            {{-- Utilizza stesse condizioni del jumbotron --}}
            @if (Route::is('home') || Route::is('index')|| Route::is('search') )
                <div class="section-content-jumbo">
                    @yield('content')
                </div>
            @else
                <div class="section-content">
                    @yield('content')
                </div>
            @endif


        <footer class="my-footer text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
              <!-- Section: Social media -->
              <section class="mb-4">
                <!-- Facebook -->
                <a
                  class="btn btn-primary btn-floating m-1"
                  style="background-color: #3b5998;"
                  href="#!"
                  role="button"
                  ><i class="fab fa-facebook-f"></i
                ></a>

                <!-- Twitter -->
                <a
                  class="btn btn-primary btn-floating m-1"
                  style="background-color: #55acee;"
                  href="#!"
                  role="button"
                  ><i class="fab fa-twitter"></i
                ></a>

                <!-- Google -->
                <a
                  class="btn btn-primary btn-floating m-1"
                  style="background-color: #dd4b39;"
                  href="#!"
                  role="button"
                  ><i class="fab fa-google"></i
                ></a>

                <!-- Instagram -->
                <a
                  class="btn btn-primary btn-floating m-1"
                  style="background-color: #ac2bac;"
                  href="#!"
                  role="button"
                  ><i class="fab fa-instagram"></i
                ></a>

                <!-- Linkedin -->
                <a
                  class="btn btn-primary btn-floating m-1"
                  style="background-color: #0082ca;"
                  href="#!"
                  role="button"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
                <!-- Github -->
                <a
                  class="btn btn-primary btn-floating m-1"
                  style="background-color: #333333;"
                  href="#!"
                  role="button"
                  ><i class="fab fa-github"></i
                ></a>
              </section>
              <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2021 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/">Team3 - IDRA</a>
            </div>
            <!-- Copyright -->
          </footer>
    </div>

    {{-- Javascript --}}
    <script src="{{ asset('js/app.js') }}">
        $(function () { $(document).scroll(function () { var $nav = $(".fixed-top"); $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height(50)); }); });
    </script>
</body>
</html>
