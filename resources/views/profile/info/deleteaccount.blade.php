<fieldset class="d-flex flex-column justify-content-center align-items-center mb-5">
    <legend class="text-center">Elimina l'account</legend>
    <form id="fEditPassword" class="w-50" method="post" action="#">
        @csrf
        @method("DELETE")
        <div class="mb-3 d-flex justify-content-center">
            <p>Elimina definitivamente il tuo account</p>
        </div>
        <div class="form-group mb-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-danger">ELIMINA</button>
        </div>
    </form>
</fieldset>