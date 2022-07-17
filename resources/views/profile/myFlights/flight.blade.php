@extends('layouts.menu')

@section('title','Informazioni volo')

@section('links')
<link rel="stylesheet" href="{{ asset('css/profile/myFlights/flight.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/profile/myFlights/flight.js') }}"></script>
@endsection

@section('content')
    <div class="content">
        <h2 class="fb-header">Informazioni volo</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">COMPAGNIA AEREA</div>
                <div class="col-12 col-md-5 company-name">{{ $flight['company_name'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">PAESE DI PARTENZA</div>
                <div class="col-12 col-md-5 departure-country">{{ $flight['departure_country'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">AEREOPORTO DI PARTENZA</div>
                <div class="col-12 col-md-5 departure-airport">{{ $flight['departure_airport'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">PAESE DI ARRIVO</div>
                <div class="col-12 col-md-5 arrival-country">{{ $flight['arrival_country'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">AEREOPORTO DI ARRIVO</div>
                <div class="col-12 col-md-5 arrival-airport">{{ $flight['arrival_airport'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">DATA DI PRENOTAZIONE</div>
                <div class="col-12 col-md-5 booking-date">{{ $flight['booking_date'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">DATA DEL VOLO</div>
                <div class="col-12 col-md-5 flight-date">{{ $flight['flight_date'].' '.$flight['flight_time'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">PREZZO TOTALE</div>
                <div class="col-12 col-md-5 total-price">{{ $flight['total_price'] }}€</div>
            </div>   
            <div class="row justify-content-evenly">
                <div class="col-3 col-md-1 fb-book-button">
                    <button type="button" class="btn btn-primary">PRENOTA</button>
                </div>
                <div class="col-3 col-md-1 fb-delete-button">
                    <form id="fDelete" method="post" action="{{ route('myFlights.destroy', ['myFlight' => $flight['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="flight_id" value="{{ $flight['id'] }}">
                        <button type="submit" class="btn btn-danger">ELIMINA</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection