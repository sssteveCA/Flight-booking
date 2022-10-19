@extends('layouts.menu')

@section('namespaces')
    @php
       use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('title','Prezzo albergo scelto')

@section('links')
@endsection

@section('scripts')
@endsection

@section('content')
    @if($done == true)
        @php
            <form id="fHotelPrice" method="post" action="#">
                @csrf
                @method('POST')
                <input type="hidden" name="session_id" value="">
                <div class="hotel-div">
                    <div class="hotel-header">Preventivo prenotazione</div>
                    <div class="hotel-row">
                        <div class="column-elem">
                            <p class="hp-ce-header">Paese</p>
                            <p>{{ $data['country'] }}</p>
                        </div>
                        <div class="column-elem">
                            <p class="hp-ce-header">Città</p>
                            <p>{{ $data['city'] }}</p>
                        </div>
                        <div class="column-elem">
                            <p class="hp-ce-header">Albergo</p>
                            <p>{{ $data['hotel'] }}</p>
                        </div>
                        <div class="column-elem">
                            <p class="hp-ce-header">Data check-in</p>
                            <p>{{ $data['checkin'] }}</p>
                        </div>
                        <div class="column-elem">
                            <p class="hp-ce-header">Data check-in</p>
                            <p>{{ $data['checkout'] }}</p>
                        </div>
                        <div class="column-elem">
                            <p class="hp-ce-header">Persone</p>
                            <p>{{ $data['people'] }}</p>
                        </div>
                        <div class="column-elem">
                            <p class="hp-ce-header">Stanze</p>
                            <p>{{ $data['rooms'] }}</p>
                        </div>
                        <div class="column-elem">
                            <p class="hp-ce-header">Prezzo</p>
                            <p>{{ $data['price'] }}€</p>
                        </div>
                    </div>
                </div>
                <div class="form-button my-4 text-center">
                    <button type="submit">PRENOTA</button>
                </div>
            </form>
        @endphp
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
