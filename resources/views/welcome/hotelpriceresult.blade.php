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
        <form id="fHotelPrice" method="post" action="#">
            @csrf
            @method('POST')
            <input type="hidden" name="session_id" value="">
            <div class="hotel-div">
                <div class="hotel-header bg-success bg-gradient">Preventivo prenotazione</div>
                <div class="hotel-row">
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Paese</p>
                        <p class="bg-light bg-gradient">{{ $data['country'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Città</p>
                        <p class="bg-light bg-gradient">{{ $data['city'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Albergo</p>
                        <p class="bg-light bg-gradient">{{ $data['hotel'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Data check-in</p>
                        <p class="bg-light bg-gradient">{{ $data['checkin'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Data check-in</p>
                        <p class="bg-light bg-gradient">{{ $data['checkout'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Persone</p>
                        <p class="bg-light bg-gradient">{{ $data['people'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Stanze</p>
                        <p class="bg-light bg-gradient">{{ $data['rooms'] }}</p>
                    </div>
                    <div class="column-elem">
                        <p class="hp-ce-header bg-warning bg-gradient">Prezzo</p>
                        <p class="bg-light bg-gradient">{{ $data['price'] }}€</p>
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
