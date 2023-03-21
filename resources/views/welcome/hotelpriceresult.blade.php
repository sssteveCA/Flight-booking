@extends('layouts.page')

@section('namespaces')
    @php
       use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('title','Prezzo albergo scelto')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/welcome/hotelpriceresult.css') }}">
@endsection

@section('scripts')
    @parent
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../" />
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
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Città</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['city'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Albergo</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['hotel'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Data check-in</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['checkin'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Data check-out</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['checkout'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Persone</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['people'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Stanze</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['rooms'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Prezzo</p>
                        <p class="bg-light bg-gradient">{{ $response['hotel']['price'] }}€</p>
                    </div>
                </div>
            </div>
            <div class="form-button my-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg">PRENOTA</button>
            </div>
        </form>
    @elseif($done == false)
        @isset($error_message)
            <x-alert classes="alert alert-danger" :message="$error_message" />
        @endisset
    @endif
    @isset($errors)
        @foreach($errors as $k => $input_errors)
            @foreach($input_errors as $k => $error)
                <x-alert classes="alert alert-danger" :message="$error" />
            @endforeach
        @endforeach
    @endisset
@endsection
