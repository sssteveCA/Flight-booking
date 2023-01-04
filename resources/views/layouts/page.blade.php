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
            <link href="{{ asset('css/layouts/menu.css') }}" rel="stylesheet">
            <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
        @show
        @section('scripts')
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="{{ asset('js/layouts/menu.js') }}"></script>
        @show
        @includeIf(P::VIEW_PRIVACY)
    </head>
    <body>
        @include(P::VIEW_MENU)
        <div class="content my-5">
            @yield('content')
        </div>
        @include(P::VIEW_FOOTER)
    </body>
</html>