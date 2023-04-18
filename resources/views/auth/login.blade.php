@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Login')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/login.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Accedi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Indirizzo Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}">

                                    <label class="form-check-label" for="remember">
                                        {{ __('Rimani collegato') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="showPassword" id="showPassword">

                                    <label class="form-check-label" for="showPassword">
                                        {{ __('Mostra password') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        @if(isset($_REQUEST['session_id']))
                            <input type="hidden" name="session_id" value="{{ $_REQUEST['session_id'] }}">
                        @endif
                        @include(P::VIEW_FLIGHTLOGIN)
                        @include(P::VIEW_HOTELLOGIN)
                        @include(P::VIEW_CARRENTALLOGIN)
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Hai dimenticato la password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(isset($done,$message) && $done === false)
    <div class="row mt-2">
        <div class="col-12">
            <x-alert classes="alert alert-danger" :message="$message" />
        </div>
    </div>
    @endif
    {{-- @php
        echo '<pre>';
        var_dump($_REQUEST);
        echo '</pre>';
    @endphp --}}
    
</div>
@endsection
