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
                @include(P::VIEW_PAYPAL_DATA, [
                    'route_paypal_return' => route(P::ROUTE_FLIGHT_PAYPAL_RETURN),
                    'route_paypal_cancel' => route(P::ROUTE_FLIGHT_PAYPAL_CANCEL)
                    ])
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