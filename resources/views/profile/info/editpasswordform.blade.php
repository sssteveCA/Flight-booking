<fieldset class="d-flex flex-column justify-content-center align-items-center mb-5 border-bottom border-secondary">
    <legend class="text-center">Modifica password</legend>
    <form id="fEditPassword" class="w-50" method="post" action="{{ route('usercontroller.editpassword') }}">
        @csrf
        @method("PATCH")
        <div class="form-group mb-3">
            <label for="password">Vecchia password </label>
            <input type="password" class="form-control" id="oldpwd" name="oldpwd" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Nuova password </label>
            <input type="password" class="form-control" id="newpwd" name="newpwd" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Conferma nuova password </label>
            <input type="password" class="form-control" id="confnewpwd" name="confnewpwd" required>
        </div>
        <div class="col-md-6 offset-md-4" style="margin-left: 0;">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="showPassword" id="showPassword">

                <label class="form-check-label" for="showPassword">
                    {{ __('Mostra password') }}
                </label>
            </div>
        </div>
        <div class="form-group mb-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">AGGIORNA</button>
        </div>
    </form>
</fieldset>