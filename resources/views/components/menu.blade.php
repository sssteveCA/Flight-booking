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
                    <x-menu.profile 
                        :route-info="$attributes['route-info']" 
                        :route-myflights-index="$attributes['route-myflights-index']" 
                        :route-myhotels-index="$attributes['route-myhotels-index']" 
                        :route-mycars-index="$attributes['route-mycars-index']"
                        :route-logout="$attributes['route-logout']" />
                    @else
                        <x-menu.not-logged 
                            :route-login="$attributes['route-login']" 
                            :route-register="$attributes['route-register']" />
                    @endauth
                @endif
                <x-menu.privacy 
                    :url-privacy="$attributes['url-privacy']" 
                    :url-cookie="$attributes['url-cookie']" 
                    :url-terms="$attributes['url-terms']" />
            </ul>
        </div>
    </div>
</nav>

 
