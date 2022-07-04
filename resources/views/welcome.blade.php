@extends('layouts.menu')

@section('title','Home FlightBooking')

@section('links')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')
<div id="fb-content">
    <div class="fb-tab">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="tab-flights-tab" data-bs-toggle="tab" data-bs-target="#tab-flights" type="button" role="tab" aria-controls="tab-flights" aria-selected="true">Voli</button>
                <button class="nav-link" id="car-rental-tab" data-bs-toggle="tab" data-bs-target="#car-rental" type="button" role="tab" aria-controls="car-rental" aria-selected="false">Autonoleggio</button>
                <button class="nav-link" id="hotel-tab" data-bs-toggle="tab" data-bs-target="#hotel" type="button" role="tab" aria-controls="hotel" aria-selected="false">Hotel</button>
                <button class="nav-link" id="events-tab" data-bs-toggle="tab" data-bs-target="#events" type="button" role="tab" aria-controls="events" aria-selected="false">Eventi</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="tab-flights" role="tabpanel" aria-labelledby="tab-flights-tab">
            <form id="flightSearch" method="get" action="#">
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="roundtrip" id="fb-roundtrip">
                        <label class="form-check-label" for="fb-roundtrip">Andata e ritorno</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="oneway" id="fb-oneway">
                        <label class="form-check-label" for="fb-oneway">Solo andata</label>
                    </div>
                </div>
                <div>
                    <input type="text" class="form-control" id="fb-from" name="from" placeholder="Partenza">
                    <input type="text" class="form-control" id="fb-to" name="to" placeholder="Destinazione">
                    <button type="submit" class="btn btn-danger">Cerca</button>
                </div>
            </form>
            
        </div>
        <div class="tab-pane fade" id="car-rental" role="tabpanel" aria-labelledby="car-rental-tab">Autonoleggio</div>
        <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">Hotel</div>
        <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">Eventi</div>
        </div>
    </div>
</div>

@endsection

