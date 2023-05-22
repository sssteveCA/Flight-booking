@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Paga le auto prenotate')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/bookcarrental/bookcarrental.css') }}">
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../" />
    @isset($message)
        @if($done == true)
            <x-message-container title="Prenotazione auto" :message="$message" />
            <form id="fCarRentalPrice" method="post" action="{{ env('PAYPAL_FORM_URL') }}">
                @include(P::VIEW_PAYPAL_DATA, [
                    'route_paypal_return' => '',
                    'route_paypal_cancel' => ''
                ])
                <div class="my-3">
                    <input type="hidden" name="item_name_1" value="{{ $carrental['car_name'] }}">
                    <input type="hidden" name="item_number_1" value="{{ $carrental['id'] }}">
                    <input type="hidden" name="amount_1" value="{{ $carrental['price'] }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">PAGA</button>
                </div>
            </form>
        @else
            <x-alert classes="alert alert-danger" :message="$message" />
        @endif
    @endisset
@endsection