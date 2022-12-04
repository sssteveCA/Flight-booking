@extends('layouts.menu')

@section('namespaces')
    @php
       use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('title','Prezzo albergo scelto')

@section('links')
<link rel="stylesheet" href="{{ asset('css/welcome/hotelpriceresult.css') }}">
@endsection

@section('scripts')
@endsection

@section('content')
    @if($done == true)
        <form id="fHotelPrice" method="post" action="{{ route(P::ROUTE_BOOKHOTEL) }}">
            @csrf
            @method('POST')
            <input type="hidden" name="session_id" value="{{ $data['session_id'] }}">
            <div class="hotel-div">
                <div class="hotel-header bg-success bg-gradient">Preventivo prenotazione</div>
                <div class="hotel-row">
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Paese</p>
                        <p class="bg-light bg-gradient">{{ $data['country'] }}</p>
                        <input type="hidden" name="country" value="{{ $data['country'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Città</p>
                        <p class="bg-light bg-gradient">{{ $data['city'] }}</p>
                        <input type="hidden" name="city" value="{{ $data['city'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Albergo</p>
                        <p class="bg-light bg-gradient">{{ $data['hotel'] }}</p>
                        <input type="hidden" name="hotel" value="{{ $data['hotel'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Data check-in</p>
                        <p class="bg-light bg-gradient">{{ $data['checkin'] }}</p>
                        <input type="hidden" name="checkin" value="{{ $data['checkin'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Data check-in</p>
                        <p class="bg-light bg-gradient">{{ $data['checkout'] }}</p>
                        <input type="hidden" name="checkout" value="{{ $data['checkout'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Persone</p>
                        <p class="bg-light bg-gradient">{{ $data['people'] }}</p>
                        <input type="hidden" name="people" value="{{ $data['people'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Stanze</p>
                        <p class="bg-light bg-gradient">{{ $data['rooms'] }}</p>
                        <input type="hidden" name="rooms" value="{{ $data['rooms'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Prezzo</p>
                        <p class="bg-light bg-gradient">{{ $data['price'] }}€</p>
                        <input type="hidden" name="price" value="{{ $data['price'] }}">
                    </div>
                </div>
            </div>
            <div class="form-button my-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg">PRENOTA</button>
            </div>
        </form>
    @elseif($done == false)
        @isset($error_message)
            <div class="alert alert-danger" role="alert">{{$error_message}}</div>
        @endisset
    @endif
    @isset($errors)
        @foreach($errors as $k => $input_errors)
            @foreach($input_errors as $k => $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
            @endforeach
        @endforeach
    @endisset
@endsection
