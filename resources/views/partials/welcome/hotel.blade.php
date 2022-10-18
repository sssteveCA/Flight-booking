<div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
    <div class="container">
        <div class="row">
            <div id="fb-h1" class="form-floating col-12 col-md-6 col-lg-4">
                <select id="hotelCountries" class="form-select form-select-lg" name="country"></select>
                <label for="hotelCountries">Paese</label>
            </div>
            <div id="fb-h2" class="form-floating col-12 col-md-6 col-lg-4">
                <select id="hotelCities" class="form-select form-select-lg" name="city"></select>
                <label for="hotelCities">Città</label>
            </div>
            <div id="fb-h3" class="form-floating col-12 col-md-6 col-lg-4">
                <select id="hotelsList" class="form-select form-select-lg" name="hotel"></select>
                <label for="hotelsList">Albergo</label>
            </div>
        </div>
        <div class="row">
            <div id="fb-h4" class="form-floating col-12 col-md-6 col-lg-3">
                <input type="date" id="fb-checkin" class="form-control" name="checkin" >
                <label for="fb-checkin">Check-in</label>
            </div>
            <div id="fb-h5" class="form-floating col-12 col-md-6 col-lg-3">
                <input type="date" id="fb-checkout" class="form-control" name="checkout">
                <label for="fb-checkout">Check-out</label>
            </div>
            <div id="fb-h6" class="form-floating col-12 col-md-6 col-lg-3">
                <input type="text" id="fb-rooms" class="form-control" name="rooms" value="1">
                <label for="fb-rooms">Camere</label>
            </div>
            <div id="fb-h7" class="form-floating col-12 col-md-6 col-lg-3">
                <input type="text" id="fb-people" class="form-control" name="people" value="1">
                <label for="fb-people">Numero di persone</label>
            </div>
            <div id="fb-h8" class="col-12 col-md-6 col-lg-2">
                <button type="submit" class="btn btn-danger">Vedi preventivo</button>
            </div>
        </div>
    </div>
    <div id="hotel_info_result">
        
    </div>
</div>