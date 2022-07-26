@extends('layouts.menu')

@section('namespace')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Paga le stanze dell\'albergo prenotate')

@section('links')
    <link rel="stylesheet" href=" {{ asset('css/bookhotel/bookhotel.css') }}">
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,['back_image' => '../img/back.png', 'back_url' => '../'])
    @isset($message)
        @if($done == true)
        <div class="container mt-5">
            <h2 class="mt-5 text-center">Prenotazione stanze d'albergo</h2>
            <p class="lead text-center">{{ $message }}</p>
        </div>
        <div class="form-div">
            <form id="fHotelPrice" method="post" action="#">
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
                    <input type="hidden" name="return" value="{{ route(P::ROUTE_PAYPAL_RETURN) }}">
                    <input type="hidden" name="cbt" value="Torna al sito">
                    <input type="hidden" name="cancel_return" value="{{ route(P::ROUTE_PAYPAL_CANCEL) }}">
                </div>
                <div class="my-3">
                    <input type="hidden" name="item_name" value="{{ $hotel['hotel'] }}">
                    <input type="hidden" name="amount" value="{{ $hotel['price'] }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">PAGA</button>
                </div>
            </form>
        </div>
        @else
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @endif
    @endisset
@endsection