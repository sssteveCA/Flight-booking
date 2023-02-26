<div class="tab-pane fade" id="car-rental" role="tabpanel" aria-labelledby="car-rental-tab">
    <form id="fCarRental" method="post" action="#">
        <div class="container">
            <div class="row">
                <div id="fb-rc1" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-rent-company" class="form-select rent-company" name="rent_company"></select>
                    <label for="fb-rc-rent-company">Compagnia di noleggio</label>
                </div>
                <div id="fb-rc2" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-car" class="form-select car" name="car"></select>
                    <label for="fb-rc-car">Modello automobile</label>
                </div>
            </div>
            <div class="row">
                <div id="fb-rc3" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-pickup-location" class="form-select pickup-location" name="pickup_location"></select>
                    <label for="fb-rc-pickup-location">Località di ritiro</label>
                </div>
                <div id="fb-rc4" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-delivery-location" class="form-select delivery-location" name="delivery_location"></select>
                    <label for="fb-rc-delivery-location">Località di consegna</label>
                </div>
            </div>
            <div class="row">
                <div id="fb-rc5" class="form-floating col-12 col-md-6 col-lg-5">
                    <input type="datetime-local" id="fb-rentstart" class="form-control" name="rentstart" >
                    <label for="fb-rentstart">Data di ritiro</label>
                </div>
                <div id="fb-rc6" class="form-floating col-12 col-md-6 col-lg-5">
                    <input type="datetime-local" id="fb-rentend" class="form-control" name="rentend">
                    <label for="fb-rentend">Data di consegna</label>
                </div>
            </div>
            <div class="row">
                <div id="fb-rc7" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-age-range" class="form-select age-range" name="age_range"></select>
                    <label for="fb-rc-age-range">Fascia d'età</label>
                </div>
            </div>
            <div class="row">
                <div id="fb-rc8" class="col-12 col-lg-2">
                    <button type="submit" class="btn btn-danger">Andiamo</button>
                </div>
            </div>
                
            </div>
        </div>
    </form>  
</div>