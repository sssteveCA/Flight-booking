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
    @include(P::VIEW_BACKBUTTON,['back_image' => '../../img/back.png', 'back_url' => '../../' ])
    @if($done == true)
    <div class="container-fluid">
        <div class="row mt-5 justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-6 div-image">
                <img src="{{ asset(P::DIR_FLIGHT_EVENTS_IMG.'/'.$flightevent['image']) }}" alt="{{ $flightevent['name'] }}" title="{{ $flightevent['name'] }}">
            </div>
            <div class="col-12 col-md-6 d-flex flex-column">
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
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <span class="fw-bold text-uppercase">PREZZO: </span>
                <span class="event-price">{{ $flightevent['price'] }}€</span>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <label for="event_quantity" class="form-label">Quantità</label>>
                <input type="number" id="event_quantity" class="form-control" name="quantity" form="fEvents">
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <form id="fEvents" method="post" action="#">
                <input type="hidden" name="id" value="{{ $flightevent['id'] }}">
                <button type="button" class="btn btn-success btn-lg">PRENOTA</button>
            </form>
        </div>
    </div>
    @else
        @isset($message)
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @endisset
    @endif
@endsection