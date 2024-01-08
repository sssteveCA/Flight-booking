@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/flightevents/flightevent.css') }}">
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../../" />
    @if($done == true)
    <div class="container-fluid">
        <div class="row mt-5 justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-6 div-image d-flex justify-content-center">
                <img src="{{ asset(P::DIR_FLIGHT_EVENTS_IMG.'/'.$flightevent['image']) }}" alt="{{ $flightevent['name'] }}" title="{{ $flightevent['name'] }}">
            </div>
            <div class="col-12 col-lg-6 d-flex flex-column mt-3 mt-lg-0 event-info">
                <div>
                    <h3 class="event-name text-uppercase">{{ $flightevent['name'] }}</h3>
                    <p class="event-date">{{ $flightevent['date'] }}</p>
                    <p class="event-location">
                        <a href="{{ $flightevent['gmLink'] }}" target="_blank">{{ $flightevent['location'] }}</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-5 gx-2 justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 event-price">
                <span class="fw-bold text-uppercase me-2">PREZZO: </span>
                <span>{{ $flightevent['price'] }}€</span>
            </div>
            <div class="col-12 col-md-6 col-lg-4 ticket-quantity align-items-center">
                <label for="tickets" class="form-label me-2">Quantità</label>
                <input type="number" id="tickets" class="form-control" name="tickets" form="fEvents">
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <form id="fEvents" class="text-center" method="post" action="{{ route(P::ROUTE_FLIGHTEVENTBOOKPRICE) }}">
                @csrf
                @method('POST')
                <input type="hidden" name="event_id" value="{{ $flightevent['id'] }}">
                <button type="submit" class="btn btn-success btn-lg">PRENOTA</button>
            </form>
        </div>
    </div>
    @else
        @isset($message)
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @endisset
    @endif
@endsection