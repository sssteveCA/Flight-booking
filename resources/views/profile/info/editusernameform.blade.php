<fieldset class="d-flex flex-column justify-content-center align-items-center mb-5 border-bottom border-secondary">
    <legend class="text-center">Modifica username</legend>
    <form id="fEditUsername" class="w-50" method="post" action="{{ route('usercontroller.editusername') }}">
        @csrf
        @method("PATCH")
        <div class="form-group mb-3">
            <label for="username">Username </label>
            <input type="text" class="form-control" id="username" name="username" value="{{isset($user->name)? $user->name : ''}}">
        </div>
        <div class="form-group mb-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">MODIFICA</button>
        </div>
        <div class="text-center mb-3">
            <div id="eu-spinner" class="spinner-border text-primary d-none" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </form>
</fieldset>