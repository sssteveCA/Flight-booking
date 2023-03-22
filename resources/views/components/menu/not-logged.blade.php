<li class="nav-item">
    <a href="{{ $attributes['route-login'] }}" class="nav-link">Log in</a>
</li>
@if (Route::has('register'))
<li class="nav-item">
    <a href="{{ $attributes['route-register'] }}" class="nav-link">Registrati</a>
</li>
@endif