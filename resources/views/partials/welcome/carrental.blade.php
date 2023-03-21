<div class="tab-pane fade" id="car-rental" role="tabpanel" aria-labelledby="car-rental-tab">
    <form id="fCarRental" method="post" action="{{ route($carRentalPriceRoute) }}">
        @METHOD('POST')
        @csrf
        <div class="container">
            <div class="row">
                <div id="fb-rc1" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-rent-company" class="form-select rent-company" name="rent_company"></select>
                    <label for="fb-rc-rent-company">Compagnia di noleggio</label>
                </div>
                @error('rent_company')
                    <x-alert classes="alert alert-danger" :message="$message" />
                @enderror
                <div id="fb-rc2" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-car" class="form-select car" name="car"></select>
                    <label for="fb-rc-car">Modello automobile</label>
                </div>
                @error('car')
                    <x-alert classes="alert alert-danger" :message="$message" />
                @enderror
            </div>
            <div class="row">
                <div id="fb-rc3" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-pickup-country" class="form-select pickup-country" name="pickup_country"></select>
                    <label for="fb-rc-pickup-country">Paese di ritiro</label>
                </div>
                @error('pickup_country')
                    <x-alert classes="alert alert-danger" :message="$message" />
                @enderror
                <div id="fb-rc4" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-pickup-location" class="form-select pickup-location" name="pickup_location"></select>
                    <label for="fb-rc-pickup-location">Località di ritiro</label>
                </div>
                @error('pickup_location')
                    <x-alert classes="alert alert-danger" :message="$message" />
                @enderror
            </div>
            <div class="row">
                <div id="fb-rc5" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-delivery-country" class="form-select delivery-country" name="delivery_country"></select>
                    <label for="fb-rc-delivery-country">Paese di consegna</label>
                </div>
                @error('delivery_country')
                    <x-alert classes="alert alert-danger" :message="$message" />
                @enderror
                <div id="fb-rc6" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-delivery-location" class="form-select delivery-location" name="delivery_location"></select>
                    <label for="fb-rc-delivery-location">Località di consegna</label>
                </div>
                @error('delivery_location')
                    <x-alert classes="alert alert-danger" :message="$message" />
                @enderror
            </div>
            <div class="row">
                <div id="fb-rc7" class="form-floating col-12 col-md-6 col-lg-5">
                    <input type="date" id="fb-rc-rentstart" class="form-control" name="rentstart" >
                    <label for="fb-rc-rentstart">Data di ritiro</label>
                </div>
                <div id="fb-rc8" class="form-floating col-12 col-md-6 col-lg-5">
                    <input type="date" id="fb-rc-rentend" class="form-control" name="rentend">
                    <label for="fb-rc-rentend">Data di consegna</label>
                </div>
            </div>
            <div class="row">
                <div id="fb-rc9" class="form-floating col-12 col-md-6 col-lg-5">
                    <select id="fb-rc-age-range" class="form-select age-range" name="age_range"></select>
                    <label for="fb-rc-age-range">Fascia d'età</label>
                </div>
                @error('age_range')
                    <x-alert classes="alert alert-danger" :message="$message" />
                @enderror
            </div>
            <div class="row">
                <div id="fb-rc10" class="col-12 col-lg-2">
                    <button type="submit" class="btn btn-danger">Andiamo</button>
                </div>
            </div>
        </div>
        <div id="car_rental_info" class="mt-3"></div>
        <div id="car_rental_images"></div>
    </form>  
</div>