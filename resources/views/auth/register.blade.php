@extends('layouts.page')

@section('title','Registrazione')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('scripts')
@parent
    <script src="{{ asset('js/auth/register.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Registrati') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome utente') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @isset($rc_errors['name'])
                                    @foreach($rc_errors['name'] as $error)
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $error }}</strong>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Indirizzo Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @isset($rc_errors['email'])
                                    @foreach($rc_errors['email'] as $error)
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $error }}</strong>
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @isset($rc_errors['password'])
                                    @foreach($rc_errors['password'] as $error)
                                    <div class="alert alert-danger my-2" role="alert">
                                        {{ $error }}
                                    </div>
                                    @endforeach
                                @endisset
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="fb_reg_show_pwd" name="show_password">
                                    <label class="form-check-label" for="fb_reg_show_pwd">Mostra password</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
