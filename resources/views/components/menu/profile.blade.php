<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="navbarDropdown">
        <a href="{{ $attributes['route-info'] }}" class="dropdown-item">Il mio profilo</a>
        <a href="{{ $attributes['route-myflights-index'] }}" class="dropdown-item">I miei voli</a>
        <a href="{{ $attributes['route-myhotels-index'] }}" class="dropdown-item">Le mie stanze</a>
        <a href="" class="dropdown-item">Auto noleggiate</a>
        <a id="logout-item" class="dropdown-item" href="{{ $attributes['route-logout'] }}">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ $attributes['route-logout'] }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>