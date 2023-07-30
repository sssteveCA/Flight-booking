@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title', 'Informazioni sull\' auto noleggiata')

@section('links')
    @parent
@endsection

@section('scripts')
    @parent
@endsection

@section('content')
<x-back-button back_image="/img/back.png" back_url="../myCars" />
<div class="content">
    <h2 class="cr-header">Informazioni auto</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 cr-property">NOME AUTO</div>
            <div class="col-12 col-md-5 name">{{ $car['car_name'] }}</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 cr-property">COMPAGNIA</div>
            <div class="col-12 col-md-5 company">{{ $car['company_name'] }}</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 cr-property">FASCIA D'ETA PRENOTATA</div>
            <div class="col-12 col-md-5 age-range">{{ $car['age_range'] }} anni</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 cr-property">DATA DI RITIRO</div>
            <div class="col-12 col-md-5 rentstart-date">{{ $car['rentstart_date'] }}</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 cr-property">DATA DI CONSEGNA</div>
            <div class="col-12 col-md-5 rentend-date">{{ $car['rentend_date'] }}</div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 cr-property">STANZE PAGATE</div>
            <div class="col-12 col-md-5 payed">{{ $car['payed'] == '1' ? 'Sì' : 'No' }}€</div>
        </div>
        @if($car['payed'] == '1')
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 fb-property">DATA PAGAMENTO</div>
            <div class="col-12 col-md-5 payment-date">{{ $hotel['payed_date'] }}</div>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 cr-property">PREZZO TOTALE</div>
            <div class="col-12 col-md-5 price">{{ $car['price'] }}€</div>
        </div>
        <div @class([
            'row',
            'justify-content-center' => $car['payed'] == '1',
            'justify-content-evenly' => !$car['payed'] == '1'
            ])>
            @if($car['payed'] == '0')
                <div class="col-3 col-md-1 cr-book-button">
                    <form id="fCarBook" method="post" action="#">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="car_id" value="{{ $car['id'] }}">
                        <button type="submit" class="btn btn-primary">PRENOTA</button>
                    </form>
                </div>
            @endif
            <div class="col-3 col-md-1 cr-delete-button">
                <form id="fCarDelete" method="post" action="#">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="car_id" value="{{ $car['id'] }}">
                    <button type="submit" class="btn btn-danger">ELIMINA</button>
                </form>   
            </div>
        </div>
    </div>
</div>
@endsection