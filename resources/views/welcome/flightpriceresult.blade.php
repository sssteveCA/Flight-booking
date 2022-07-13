@extends('layouts.menu')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('title','Prezzo volo scelto')

@section('links')
<link rel="stylesheet" href="{{ asset('css/welcome/flightpriceresult.css') }} ">
@endsection

@section('scripts')
@endsection

@section('content')
    @isset($response['flight_type'])
        <form id="fFlightPrice" method="post" action="{{ route(P::ROUTE_BOOKFLIGHT) }}">
            @csrf
            @method('POST')
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="no_note" value="0">
            <input type="hidden" name="bn" value="RB_BuyNow_WPS_IT">
            <input type="hidden" name="tax_cart" value="0.00">
            <input type="hidden" name="rm" value="2">
            <input type="hidden" name="business" value="">
            <input type="hidden" name="handling_cart" value="0">
            <input type="hidden" name="currency_code" value="EUR">
            <input type="hidden" name="lc" value="IT">
            <input type="hidden" name="return" value="{{ P::URL_BOOKFLIGHT_PAYPAL_RETURN }}">
            <input type="hidden" name="cbt" value="Torna al sito">
            <input type="hidden" name="cancel_return" value="{{ P::URL_BOOKFLIGHT_PAYPAL_CANCEL }}">
            @foreach($response['flights'] as $type => $flight)
            <div class="flight-div">
                @if($type == 'outbound')
                    <div class="flight-type bg-success bg-gradient">Volo di andata</div>
                @elseif($type == 'return')
                    <div class="flight-type bg-success bg-gradient">Volo di ritorno</div>
                @else
                    <div class="flight-type bg-success bg-gradient">Volo di sola andata</div>
                @endif
                <div class="flight-row">
                    <div class="company column-elem">
                        <p class="fl-header bg-warning bg-gradient">Compagnia aerea</p>
                        <p class="bg-light bg-gradient">{{$flight['company_name']}}</p>
                        <input type="hidden" name="flights[{{ $loop->index }}]['company_name']" value="{{ $flight['company_name'] }}">
                    </div>
                    <div class="date column-elem">
                        <p class="fl-header bg-warning bg-gradient">Data e orario</p>
                        <p class="bg-light bg-gradient">{{$flight['flight_date'].' '.$flight['flight_time']}}</p>
                        <input type="hidden" name="flights[{{ $loop->index }}]['booking_date']" value="{{ $flight['booking_date'] }}">
                        <input type="hidden" name="flights[{{ $loop->index }}]['flight_date']" value="{{ $flight['flight_date'] }}">
                        <input type="hidden" name="flights[{{ $loop->index }}]['flight_time']" value="{{ $flight['flight_time'] }}">
                    </div>
                    <div class="departure-loc column-elem">
                        <p class="fl-header bg-warning bg-gradient">Luogo di partenza</p>
                        <p class="bg-light bg-gradient">{{$flight['departure_country'].', '.$flight['departure_airport']}}</p>
                        <input type="hidden" name="flights[{{ $loop->index }}]['departure_country']" value="{{ $flight['departure_country'] }}">
                        <input type="hidden" name="flights[{{ $loop->index }}]['departure_airport']" value="{{ $flight['departure_airport'] }}">
                    </div>
                    <div class="arrival-loc column-elem">
                        <p class="fl-header bg-warning bg-gradient">Luogo di arrivo</p>
                        <p class="bg-light bg-gradient">{{$flight['arrival_country'].', '.$flight['arrival_airport']}}</p>
                        <input type="hidden" name="flights[{{ $loop->index }}]['arrival_country']" value="{{ $flight['arrival_country'] }}">
                        <input type="hidden" name="flights[{{ $loop->index }}]['arrival_airport']" value="{{ $flight['arrival_airport'] }}">
                    </div>
                    <div class="price column-elem">
                        <p class="fl-header bg-warning bg-gradient">Prezzo</p>
                        <p class="bg-light bg-gradient">{{$flight['total_price']}}€</p>
                        <input type="hidden" name="flights[{{ $loop->index }}]['total_price']" value="{{ $flight['total_price'] }}">
                    </div>
                </div> 
            </div>
            @endforeach
            <div class="form-button my-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg">PRENOTA</button>
            </div>
        </form>
    @endisset
    {{-- @isset($response['inputs'])
        @php
            echo '<pre>';
            var_dump($response['inputs']);
            echo '</pre>';
        @endphp
    @endisset
    @isset($response['flights']
        @php
            echo '<pre>';
            var_dump($response['flights'];
            echo '</pre>';
        @endphp
    @endisset --}}
    @isset($errors)
        @foreach($errors as $k => $input_errors)
            @foreach($input_errors as $k => $msg)
                <div class="alert alert-danger" role="alert">{{$msg}}</div>
            @endforeach
        @endforeach
    @endisset
    @isset($errors_array)
        @foreach($errors_array as $error)
            <div class="alert alert-danger" role="alert">{{$error}}</div>
        @endforeach
    @endisset
@endsection