<div class="tab-pane fade show active" id="tab-flights" role="tabpanel" aria-labelledby="tab-flights-tab">
    <form id="flightSearch" method="post" action="{{ route($FlightPriceRoute) }}">
        @csrf
        @method("POST")
        <div class="container">
            <div id="fb-fs1" class="row">
                <div class="form-check col-6 col-md-2">
                    <input class="form-check-input" type="radio" name="flight_type" id="fb-roundtrip" value="roundtrip" checked>
                    <label class="form-check-label" for="fb-roundtrip">Andata e ritorno</label>
                </div>
                <div class="form-check col-6 col-md-2">
                    <input class="form-check-input" type="radio" name="flight_type" id="fb-oneway" value="oneway">
                    <label class="form-check-label" for="fb-oneway">Solo andata</label>
                </div>
            </div>
            <div id="fb-fs2" class="row">
                <div class="col-12 col-sm-5 col-lg-5 form-floating">
                    <select class="form-select company-names" id="fb-company_name" name="company_name"></select>
                    <label for="fb-company_name">Compagnia aerea</label>
                </div>
            </div>
            <div id="fb-fs3" class="row">
                <div class="col-12 col-sm-5 col-lg-5 order-lg-1 form-floating">
                    <select class="form-select flight-loc" id="fb-from" name="from_country"></select>
                    <label for="fb-from">Paese di Partenza</label>
                </div>
                <div class="col-12 col-sm-5 col-lg-5 order-lg-3 form-floating">
                    <select class="form-select flight-loc-airports" id="fb-from-airports" name="from_airport"></select>
                    <label for="fb-from-airports">Aereoporto di partenza</label>
                </div>
                <div class="col-12 col-sm-5 col-lg-5 order-lg-2 form-floating">
                    <select type="text" class="form-select flight-loc" id="fb-to" name="to_country"></select>
                    <label for="fb-to">Paese di destinazione</label>
                </div>
                <div class="col-12 col-sm-5 col-lg-5 order-lg-4 form-floating">
                    <select type="text" class="form-select flight-loc-airports" id="fb-to-airports" name="to_airport"></select>
                    <label for="fb-to-airports">Aereoporto di destinazione</label>
                </div>         
            </div>
            <div id="fb-fs4" class="row fb-oneway-div">
                <div class="form-floating col-12 col-sm-5 col-lg-5">
                    <input type="date" id="fb-oneway-date" class="form-control" name="oneway_date">
                    <label for="fb-oneway-date">Partenza</label>
                </div>
            </div>
            <div id="fb-fs5" class="row fb-roundtrip-div">
                <div class="form-floating col-12 col-sm-5 col-lg-5">
                    <input type="date" id="fb-roundtrip-start-date" class="form-control" name="roundtrip_start_date">
                    <label for="fb-roundtrip-start-date">Andata</label>
                </div>
                <div class="form-floating col-12 col-sm-5 col-lg-5">
                    <input type="date" id="fb-roundtrip-end-date" class="form-control" name="roundtrip_end_date">
                    <label for="fb-roundtrip-end-date">Ritorno</label>
                </div>
            </div>
            <div id="fb-fs6" class="row align-items-center">
                <div class="form-floating col-12 col-sm-5 col-md-3">
                    <input type="number" id="fb-adults" class="form-control" name="adults" value="1" min="1">
                    <label for="fb-adults">Adulti</label>
                </div>
                <div class="form-floating col-12 col-sm-5 col-md-3">
                    <input type="number" id="fb-teenagers" class="form-control" name="teenagers" value="0" min="0">
                    <label for="fb-teenagers">Adolescenti</label>
                </div>
                <div class="form-floating col-12 col-sm-5 col-md-3 ">
                    <input type="number" id="fb-children" class="form-control" name="children" value="0" min="0">
                    <label for="fb-children">Bambini</label>
                </div>
                <div class="form-floating col-12 col-sm-5 col-md-3 offset-md-3">
                    <input type="number" id="fb-newborns" class="form-control" name="newborns" value="0" min="0">
                    <label for="fb-newborns">Neonati</label>
                </div>
                <div class="col-12 col-sm-3">
                    <button type="submit" class="btn btn-danger">Cerca</button>
                </div>
            </div>
        </div>
    </form>
</div>