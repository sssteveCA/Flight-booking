@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title', 'Informazioni prenotazioni stanze')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/profile/myHotels/hotel.css') }}">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/profile/myHotels/hotel.js') }}"></script>
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,['back_image' => '../../../img/back.png', 'back_url' => '../myHotels'])
    <div class="content">
        <h2 class="fb-header">Informazioni stanza</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">PAESE</div>
                <div class="col-12 col-md-5 country">{{ $hotel['country'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">CITTÀ</div>
                <div class="col-12 col-md-5 city">{{ $hotel['city'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">HOTEL</div>
                <div class="col-12 col-md-5 hotel">{{ $hotel['hotel'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">DATA DI PRENOTAZIONE</div>
                <div class="col-12 col-md-5 booking-date">{{ $hotel['booking_date'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">CHECKIN</div>
                <div class="col-12 col-md-5 checkin">{{ $hotel['checkin'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">CHECKOUT</div>
                <div class="col-12 col-md-5 checkout">{{ $hotel['checkout'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">STANZE</div>
                <div class="col-12 col-md-5 rooms">{{ $hotel['rooms'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">PERSONE</div>
                <div class="col-12 col-md-5 people">{{ $hotel['people'] }}</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">STANZE PAGATE</div>
                <div class="col-12 col-md-5 hotel-payed">{{ $hotel['payed'] == '1' ? 'Sì' : 'No' }}</div>
            </div>
            @if($hotel['payed'] == '1')
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">DATA PAGAMENTO</div>
                <div class="col-12 col-md-5 payment-date">{{ $hotel['payed_date'] }}</div>
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-12 col-md-5 fb-property">PREZZO TOTALE</div>
                <div class="col-12 col-md-5 total-price">{{ $hotel['price'] }}€</div>
            </div>
            <div @class([
                'row',
                'justify-content-center' => $hotel['payed'] == '1',
                'justify-content-evenly' => !$hotel['payed'] == '1'
                ])>
                @if($hotel['payed'] == '0')
                <div class="col-3 col-md-1 fb-book-button">
                    <form id="fHotelBook" method="post" action="{{ route(P::ROUTE_RESUMEHOTEL) }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="hotel_id" value="{{ $hotel['id'] }}">
                        <button type="submit" class="btn btn-primary">PRENOTA</button>
                    </form>
                </div>
                @endif
                <div class="col-3 col-md-1 fb-delete-button">
                    <form id="fHotelDelete" method="post" action="#">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="hotel_id" value="{{ $hotel['id'] }}">
                        <button type="submit" class="btn btn-danger">ELIMINA</button>
                    </form>   
                </div>
            </div>
        </div>
    </div>
@endsection