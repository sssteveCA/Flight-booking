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
    @if($done == true && isset($response))
        <form id="fHotelPrice" method="post" action="{{ route(P::ROUTE_BOOKHOTEL) }}">
            @csrf
            @method('POST')
            <input type="hidden" name="session_id" value="{{ $response['session_id'] }}">
            <div class="hotel-div">
                <div class="hotel-header bg-success bg-gradient">Preventivo prenotazione</div>
                <div class="hotel-row">
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Paese</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['country'] }}</p>
                        <input type="hidden" name="hotel[country]" value="{{ $response['hotel']['country'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Città</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['city'] }}</p>
                        <input type="hidden" name="hotel[city]" value="{{ $response['hotel']['city'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Albergo</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['hotel'] }}</p>
                        <input type="hidden" name="hotel[hotel]" value="{{ $response['hotel']['hotel'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Data check-in</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['checkin'] }}</p>
                        <input type="hidden" name="hotel[checkin]" value="{{ $response['hotel']['checkin'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Data check-in</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['checkout'] }}</p>
                        <input type="hidden" name="hotel[checkout]" value="{{ $response['hotel']['checkout'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Persone</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['people'] }}</p>
                        <input type="hidden" name="hotel[people]" value="{{ $response['hotel']['people'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Stanze</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['rooms'] }}</p>
                        <input type="hidden" name="hotel[rooms]" value="{{ $response['hotel']['rooms'] }}">
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Prezzo</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['price'] }}€</p>
                        <input type="hidden" name="hotel[price]" value="{{ $response['hotel']['price'] }}">
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
