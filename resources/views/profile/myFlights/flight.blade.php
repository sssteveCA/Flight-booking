@extends('layouts.menu')

@section('title','Informazioni volo')

@section('content')
    <div class="content">
        <h2 class="fb-header">Informazioni volo</h2>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 fb-property">COMPAGNIA AEREA</div>
                <div class="col-12 col-md-6 flight-name">{{ $flight['company_name'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 fb-property">PAESE DI PARTENZA</div>
                <div class="col-12 col-md-6 flight-name">{{ $flight['departure_country'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 fb-property">AEREOPORTO DI PARTENZA</div>
                <div class="col-12 col-md-6 flight-name">{{ $flight['departure_airport'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 fb-property">PAESE DI ARRIVO</div>
                <div class="col-12 col-md-6 flight-name">{{ $flight['arrival_country'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 fb-property">AEREOPORTO DI ARRIVO</div>
                <div class="col-12 col-md-6 flight-name">{{ $flight['arrival_airport'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 fb-property">DATA DI PRENOTAZIONE</div>
                <div class="col-12 col-md-6 flight-name">{{ $flight['booking_date'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 fb-property">DATA DEL VOLO</div>
                <div class="col-12 col-md-6 flight-name">{{ $flight['flight_date'].' '.$flight['flight_time'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 fb-property">PREZZO TOTALE</div>
                <div class="col-12 col-md-6 flight-name">{{ $flight['total_price'] }}</div>
            </div>   
        </div>
    </div>
@endsection