@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('title','FlightBooking')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('scripts')
    @parent
    <script lang="ts" src="{{ asset('js/welcome.js') }}"></script>
    <script lang="ts" src="{{ asset('js/welcome.hotel.js') }}"></script>
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
        @include(P::VIEW_WELCOME_FLIGHT,['flightPriceRoute' => P::ROUTE_FLIGHTPRICE])
        @include(P::VIEW_WELCOME_CAR_RENTAL,['carRentalPriceRoute' => P::ROUTE_CARRENTALPRICE])
        @include(P::VIEW_WELCOME_HOTEL,['hotelPriceRoute' => P::ROUTE_HOTELPRICE])
        <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab"></div>
    </div>
    <div id="flight-animation" class="d-flex align-items-center">
        <img id="airplane" src="{{ asset('img/airplane.png') }}">
    </div>
</div>
<div class="errors">
    @if($errors->any())
        @foreach($errors->all() as $error)
        <x-alert classes="alert alert-danger" :message="$error" />
        @endforeach
    @endif
</div>

@endsection

