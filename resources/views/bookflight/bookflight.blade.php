@extends('layouts.menu')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('content')
    @isset($message)
        <div class="container mt-5">
            <h2 class="mt-5 text-center">Prenotazione volo</h2>
            <p class="lead text-center">{{$message}}</p>
        </div>
        <div class="form-div">
            <form id="fFlightPrice" method="post" action="{{ env('PAYPAL_FORM_URL') }}">
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
            </form>
        </div>
    @endisset
@endsection