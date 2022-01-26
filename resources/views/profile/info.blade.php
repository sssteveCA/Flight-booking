@extends('layouts.app')

@section('content')
<fieldset class="d-flex flex-column justify-content-center align-items-center mb-5 border-bottom border-secondary">
    <legend class="text-center">Modifica username</legend>
    <form class="w-50" method="post" action="{{ route('infocontroller.editusername') }}">
        @csrf
        @method("PATCH")
        <div class="form-group mb-3">
            <label for="username">Username </label>
            <input type="text" class="form-control" id="username" name="username" value="{{isset($user->name)? $user->name : ''}}">
        </div>
        <div class="form-group mb-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">MODIFICA</button>
        </div>
    </form>
</fieldset>
<fieldset class="d-flex flex-column justify-content-center align-items-center mb-5">
    <legend class="text-center">Modifica password</legend>
    <form class="w-50" method="post" action="{{ route('infocontroller.editpassword') }}">
        @csrf
        @method("PATCH")
        <div class="form-group mb-3">
            <label for="password">Vecchia password </label>
            <input type="text" class="form-control" id="oldpwd" name="oldpwd">
        </div>
        <div class="form-group mb-3">
            <label for="password">Nuova password </label>
            <input type="text" class="form-control" id="newpwd" name="newpwd">
        </div>
        <div class="form-group mb-3">
            <label for="password">Conferma nuova password </label>
            <input type="text" class="form-control" id="confnewpwd" name="confnewpwd">
        </div>
        <div class="form-group mb-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">AGGIORNA</button>
        </div>
    </form>
</fieldset>
@endsection