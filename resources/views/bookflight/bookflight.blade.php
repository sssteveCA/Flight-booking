@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('title', 'Paga i voli prenotati')

@section('links')
    @parent
    <link rel="stylesheet" href=" {{ asset('css/bookflight/bookflight.css') }}">
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../" />
    @isset($message)
        @if($done == true)
        <x-message-container  title="Prenotazione volo" :message="$message" />
        <div class="form-div">
            <form id="fFlightPrice" method="post" action="{{ env('PAYPAL_FORM_URL') }}">
                <div class="my-3">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="no_note" value="0">
                    <input type="hidden" name="bn" value="RB_BuyNow_WPS_IT">
                    <input type="hidden" name="tax_cart" value="0.00">
                    <input type="hidden" name="rm" value="2">
                    <input type="hidden" name="business" value="{{ env('PAYPAL_BUSINNESS_EMAIL') }}">
                    <input type="hidden" name="handling_cart" value="0">
                    <input type="hidden" name="currency_code" value="EUR">
                    <input type="hidden" name="lc" value="IT">
                    <input type="hidden" name="return" value="{{ route(P::ROUTE_FLIGHT_PAYPAL_RETURN) }}">
                    <input type="hidden" name="cbt" value="Torna al sito">
                    <input type="hidden" name="cancel_return" value="{{ route(P::ROUTE_FLIGHT_PAYPAL_CANCEL) }}">
                </div>
                <div class="my-3">
                    @forelse($flights as $flight)
                        <input type="hidden" name="item_name_{{ $loop->iteration }}" value="{{ $flight['name'] }}">
                        <input type="hidden" name="item_number_{{ $loop->iteration }}" value="{{ $flight['id'] }}">
                        <input type="hidden" name="amount_{{ $loop->iteration}}" value="{{ $flight['flight_price'] }}">
                    @empty
                    @endforelse
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">PAGA</button>
                </div>
            </form>
        </div>
        @else
        <x-alert classes="alert alert-danger" :message="$message" />
        @endif
    @endisset
@endsection