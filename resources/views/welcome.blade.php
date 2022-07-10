@extends('layouts.menu')

@section('title','Home FlightBooking')

@section('links')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('scripts')
<script lang="ts" src="{{ asset('js/welcome.js') }}"></script>
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
        <div class="tab-pane fade show active" id="tab-flights" role="tabpanel" aria-labelledby="tab-flights-tab">
            <form id="flightSearch" method="post" action="{{ route('flightprice') }}">
                @csrf
                @method("POST")
                <div class="container">
                    <div id="fb-fs1" class="row">
                        <div class="form-check col-6 col-md-2">
                            <input class="form-check-input" type="radio" name="flight-type" id="fb-roundtrip" value="roundtrip" checked>
                            <label class="form-check-label" for="fb-roundtrip">Andata e ritorno</label>
                        </div>
                        <div class="form-check col-6 col-md-2">
                            <input class="form-check-input" type="radio" name="flight-type" id="fb-oneway" value="oneway">
                            <label class="form-check-label" for="fb-oneway">Solo andata</label>
                        </div>
                    </div>
                    <div id="fb-fs2" class="row">
                        <div class="col-12 col-sm-5 col-lg-5 order-lg-1">
                            <select class="form-select flight-loc" id="fb-from" name="from"></select>
                        </div>
                        <div class="col-12 col-sm-5 col-lg-5 order-lg-3">
                            <select class="form-select flight-loc-airports" id="fb-from-airports" name="from-airport"></select>
                        </div>
                        <div class="col-12 col-sm-5 col-lg-5 order-lg-2">
                            <select type="text" class="form-select flight-loc" id="fb-to" name="to"></select>
                        </div>
                        <div class="col-12 col-sm-5 col-lg-5 order-lg-4">
                            <select type="text" class="form-select flight-loc-airports" id="fb-to-airports" name="to-airport"></select>
                        </div>
                        
                    </div>
                    <div id="fb-fs3" class="row fb-oneway-div">
                        <div class="form-floating col-12 col-sm-5 col-lg-5">
                            <input type="date" id="fb-oneway-date" class="form-control" name="oneway-date">
                            <label for="fb-oneway-date">Partenza</label>
                        </div>
                    </div>
                    <div id="fb-fs4" class="row fb-roundtrip-div">
                        <div class="form-floating col-12 col-sm-5 col-lg-5">
                            <input type="date" id="fb-roundtrip-start-date" class="form-control" name="roundtrip-start-date">
                            <label for="fb-roundtrip-start-date">Partenza</label>
                        </div>
                        <div class="form-floating col-12 col-sm-5 col-lg-5">
                            <input type="date" id="fb-roundtrip-end-date" class="form-control" name="roundtrip-end-date">
                            <label for="fb-roundtrip-end-date">Ritorno</label>
                        </div>
                    </div>
                    <div id="fb-fs5" class="row align-items-center">
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
        <div class="tab-pane fade" id="car-rental" role="tabpanel" aria-labelledby="car-rental-tab">
            <form id="fCarRental" method="post" action="#">
                <div class="container">
                    <div class="row">
                        <div id="fb-rc1" class="col-12">
                            <input type="text" id="fb-rentcarloc" class="form-control-lg" name="rentcarloc" placeholder="Città o aereoporto per afitare l'auto">
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
        <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
            <div class="container">
                <div class="row">
                    <div id="fb-h1" class="col-12">
                        <input type="text" id="fb-hotelloc" class="form-control-lg" name="hotelloc" placeholder="Scegli la città in cui vuoi avere l'albergo">
                    </div>
                </div>
                <div class="row">
                    <div id="fb-h2" class="form-floating col-12 col-md-6 col-lg-3">
                        <input type="date" id="fb-checkin" class="form-control" name="checkin" >
                        <label for="fb-checkin">Check-in</label>
                    </div>
                    <div id="fb-h3" class="form-floating col-12 col-md-6 col-lg-3">
                        <input type="date" id="fb-checkout" class="form-control" name="checkout">
                        <label for="fb-checkout">Check-out</label>
                    </div>
                    <div id="fb-h4" class="form-floating col-12 col-md-6 col-lg-3">
                        <input type="text" id="fb-rooms" class="form-control" name="rooms">
                        <label for="fb-rooms">Ospiti e camere</label>
                    </div>
                    <div id="fb-h5" class="col-12 col-md-6 col-lg-2">
                        <button type="submit" class="btn btn-danger">Cerca</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab"></div>
    </div>
</div>
<div class="errors">
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{$error}}</div>
        @endforeach
    @endif
</div>

@endsection

