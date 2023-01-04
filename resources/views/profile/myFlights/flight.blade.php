@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Informazioni volo')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/profile/myFlights/flight.css') }}">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/profile/myFlights/flight.js') }}"></script>
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,['back_image' => '../../../img/back.png', 'back_url' => '../myFlights'])
    <div class="content">
        <h2 class="fb-header">Informazioni volo</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">COMPAGNIA AEREA</div>
                <div class="col-12 col-md-5 company-name">{{ $flight['company_name'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">PAESE DI PARTENZA</div>
                <div class="col-12 col-md-5 departure-country">{{ $flight['departure_country'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">AEREOPORTO DI PARTENZA</div>
                <div class="col-12 col-md-5 departure-airport">{{ $flight['departure_airport'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">PAESE DI ARRIVO</div>
                <div class="col-12 col-md-5 arrival-country">{{ $flight['arrival_country'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">AEREOPORTO DI ARRIVO</div>
                <div class="col-12 col-md-5 arrival-airport">{{ $flight['arrival_airport'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">DATA DI PRENOTAZIONE</div>
                <div class="col-12 col-md-5 booking-date">{{ $flight['booking_date'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">DATA DEL VOLO</div>
                <div class="col-12 col-md-5 flight-date">{{ $flight['flight_date'].' '.$flight['flight_time'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">ADULTI</div>
                <div class="col-12 col-md-5 adults">{{ $flight['adults'] }}</div>
            </div> 
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">ADOLESCENTI</div>
                <div class="col-12 col-md-5 teenagers">{{ $flight['teenagers'] }}</div>
            </div> 
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">BAMBINI</div>
                <div class="col-12 col-md-5 children">{{ $flight['children'] }}</div>
            </div> 
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">NEONATI</div>
                <div class="col-12 col-md-5 newborns">{{ $flight['newborns'] }}</div>
            </div> 
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">VOLO PAGATO</div>
                <div class="col-12 col-md-5 flight-payed">{{ $flight['payed'] == '1' ? 'Sì' : 'No' }}</div>
            </div> 
            @if($flight['payed'] == '1')
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">DATA PAGAMENTO</div>
                <div class="col-12 col-md-5 payment-date">{{ $flight['payed_date'] }}</div>
            </div> 
            @endif
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">PREZZO TOTALE</div>
                <div class="col-12 col-md-5 total-price">{{ $flight['flight_price'] }}€</div>
            </div>   
            <div @class([
                    'row',
                    'justify-content-center' => $flight['payed'] == '1',
                    'justify-content-evenly' => !$flight['payed'] == '1'
                ])>
                @if($flight['payed'] == '0')
                <div class="col-3 col-md-1 fb-book-button">
                    <form id="fFlightBook" method="post" action="{{ route(P::ROUTE_RESUMEFLIGHT) }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="flight_id" value="{{ $flight['id'] }}">
                        <button type="submit" class="btn btn-primary">PRENOTA</button>
                    </form>
                </div>
                @endif
                <div class="col-3 col-md-1 fb-delete-button">
                    <form id="fDelete" method="post" action="{{ route('myFlights.destroy', ['myFlight' => $flight['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="flight_id" value="{{ $flight['id'] }}">
                        <button type="submit" class="btn btn-danger">ELIMINA</button>
                    </form>   
                </div>
            </div>
        </div>
    </div>
@endsection