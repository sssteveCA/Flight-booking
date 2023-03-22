@section('namespaces')
    @php
        use App\Interfaces\Paths as P; 
    @endphp
@show

<html>
    <head>
        <title>@yield('title')</title>
        @yield('meta')
        @section('links')
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
            <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
        @show
        @section('scripts')
            <script lang="ts" src="{{ asset('js/app.js') }}"></script>
            <script lang="ts" src="{{ asset('js/partials/footer.js') }}"></script>
            <script lang="ts" src="{{ asset('js/partials/menu.js') }}"></script>
        @show
        @includeIf(P::VIEW_PRIVACY)
    </head>
    <body>
        <x-menu
            :route-info="route(P::ROUTE_INFO)"
            :route-login="route('login')"
            :route-logout="route('logout')"
            :route-myflights-index="route('myFlights.index')"
            :route-myhotels-index="route('myHotels.index')"
            :route-news-index="route('news.index')"
            :route-register="route('register')"
            :route-news-index="route('news.index')"
            :url-about-us="P::URL_ABOUTUS"
            :url-contacts="P::URL_CONTACTS"
            :url-cookie="P::URL_COOKIE_POLICY"
            :url-privacy="P::URL_PRIVACY_POLICY"
            :url-root="P::URL_ROOT"
            :url-terms="P::URL_TERMS" />
        <div class="content my-5">
            @yield('content')
        </div>
        <x-footer />
    </body>
</html>