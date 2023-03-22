<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-2 py-md-0">
    <div class="container-fluid px-3">
        <a class="navbar-brand" href="#">FlightBooking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-md-5" id="main_menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ $attributes['url-root'] }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ $attributes['url-about-us'] }}">Chi siamo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ $attributes['route-news-index'] }}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ $attributes['url-contacts'] }}">Contatti</a>
                </li>
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="navbarDropdown">
                            <a href="{{ $attributes['route-info'] }}" class="dropdown-item">Il mio profilo</a>
                            <a href="{{ $attributes['route-myflights-index'] }}" class="dropdown-item">I miei voli</a>
                            <a href="{{ $attributes['route-myhotels-index'] }}" class="dropdown-item">Le mie stanze</a>
                            <a id="logout-item" class="dropdown-item" href="{{ $attributes['route-logout'] }}">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ $attributes['route-logout'] }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ $attributes['route-login'] }}" class="nav-link">Log in</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ $attributes['route-register'] }}" class="nav-link">Registrati</a>
                        </li>
                        @endif
                    @endauth
                @endif
                @includeIf($viewMenuPrivacy,['privacy' => $urlPrivacyPolicy, 'cookie' => $urlCookiePolicy, 'terms' => $urlTerms])
            </ul>
        </div>
    </div>
</nav>

 
