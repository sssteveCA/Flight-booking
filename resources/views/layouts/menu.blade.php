@php
    use App\Interfaces\Paths as P; 
@endphp
<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <script src="{{asset('js/app.js')}}"></script>
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
                            <a class="nav-link" href="{{P::URL_ROOT}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{P::URL_WHOWEARE}}">Chi siamo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{P::URL_NEWS}}">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{P::URL_CONTACTS}}">Contatti</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/profile') }}" class="nav-link">Profilo</a>
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
 
