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
            {{-- Navbar --}}
            <nav class="navbar navbar-expand-lg  navbar-light my-navbar" >
                <a href="#" class="my-brand">BOOLBNB</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="my-link" href="/apartments">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                      <a class="my-link" href="/">Welcome Page</a>
                    </li>
                    <li>
                      <a class="my-link" href="{{route('search')}}">Booking</a>
                    </li>
                  </ul>
                  @if (!Auth::check())
                    <a class="btn btn-primary" href="/login">Login</a>
                  @else

                    {{-- LOGIN --}}
                    <ul class="navbar-nav left">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                                <span class="my-username"><i class="fas fa-user"></i></span>
                            </a>
                            <div class="dropdown-menu my-dropdown" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-dark" href="#">Profile</a>
                                <a class="dropdown-item text-dark" href="{{route('dashboard')}}">My Appartments</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-primary" href="{{ route('logout') }}"
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
                    {{-- /LOGIN --}}


                  @endif
                </div>
              </nav>
              {{-- /Navbar --}}


        </header>

        @yield('content')

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
              © 2020 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
          </footer>
    </div>

    {{-- Javascript --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
