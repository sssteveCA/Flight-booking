<div class="tab-pane fade" id="car-rental" role="tabpanel" aria-labelledby="car-rental-tab">
    <form id="fCarRental" method="post" action="#">
        <div class="container">
            <div class="row">
                <div id="fb-rc1" class="col-12">
                    <input type="text" id="fb-rentcarloc" class="form-control-lg" name="rentcarloc" placeholder="Città o aereoporto per affitare l'auto">
                </div>
            </div>
            <div class="row">
                <div id="fb-rc2" class="form-floating col-12 col-md-6 col-lg-5">
                    <input type="datetime-local" id="fb-rentstart" class="form-control" name="rentstart" >
                    <label for="fb-rentstart">Data di ritiro</label>
                </div>
                <div id="fb-rc3" class="form-floating col-12 col-md-6 col-lg-5">
                    <input type="datetime-local" id="fb-rentend" class="form-control" name="rentend">
                    <label for="fb-rentend">Data di consegna</label>
                </div>
                <div id="fb-rc4" class="col-12 col-lg-2">
                    <button type="submit" class="btn btn-danger">Andiamo</button>
                </div>
            </div>
        </div>
    </form>  
</div>