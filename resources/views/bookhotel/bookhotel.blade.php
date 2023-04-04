@extends('layouts.page')

@section('namespace')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Paga le stanze dell\'albergo prenotate')

@section('links')
    @parent
    <link rel="stylesheet" href=" {{ asset('css/bookhotel/bookhotel.css') }}">
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../" />
    @isset($message)
        @if($done == true)
        <x-message-container  title="Prenotazione stanze d'albergo" :message="$message" />
        <div class="form-div">
            <form id="fHotelPrice" method="post" action="{{ env('PAYPAL_FORM_URL') }}">
                @include(P::VIEW_PAYPAL_DATA, [
                    'route_paypal_return' => route(P::ROUTE_HOTEL_PAYPAL_RETURN),
                    'route_paypal_cancel' => route(P::ROUTE_HOTEL_PAYPAL_CANCEL)
                ])
                <div class="my-3">
                    <input type="hidden" name="item_name_1" value="{{ $hotel['hotel'] }}">
                    <input type="hidden" name="item_number_1" value="{{ $hotel['id'] }}">
                    <input type="hidden" name="amount_1" value="{{ $hotel['price'] }}">
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