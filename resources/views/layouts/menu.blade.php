@php
    use App\Interfaces\Paths as P; 
@endphp
@yield('namespaces')
<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        @yield('links')
        <script src="{{asset('js/app.js')}}"></script>
        @yield('scripts')
    </head>
    <body>
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">FlightBooking</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ P::URL_ROOT }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ P::URL_WHOWEARE }}">Chi siamo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news.index') }}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ P::URL_CONTACTS }}">Contatti</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('infocontroller.info') }}" class="dropdown-item">Il mio profilo</a>
                                    <a href="{{ route('myFlights.index') }}" class="dropdown-item">I miei voli</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Registrati</a>
                                </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content my-5">
            @yield('content')
        </div>
    </body>
</html>
 
