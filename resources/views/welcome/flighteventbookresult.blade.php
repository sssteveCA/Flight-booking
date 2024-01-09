@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Prezzo totale per l\' evento scelto')

@section('links')
    @parent
    <link rel="stylsheet" href="{{ asset('css/welcome/flighteventbookresult.scss') }}">
@endsection

@section('scripts')
    @parent
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../" />
    @if($done == true)
        <form id="fFePrice" method="post" action="#">
            @csrf
            @method('POST')
            <input type="hidden" name="session_id" value="{{ $response['flighteventbook']['session_id'] }}">
            <div class="flighteventbook-div">
                <div class="flighteventbook-header bg-success bg-gradient"></div>
                <div class="flighteventbook-row">
                    <div class="column-elem">
                        <p class="fe-ce-header bg-warning bg-gradient">Nome evento</p>
                        <p class="bg-light bg-gradient">{{ $response['flighteventbook']['name'] }}</p>
                    </div>
                </div>
                <div class="flighteventbook-row">
                    <div class="column-elem">
                        <p class="fe-ce-header bg-warning bg-gradient">Località</p>
                        <p class="bg-light bg-gradient">{{ $response['flighteventbook']['location'] }}</p>
                    </div>
                </div>
                <div class="flighteventbook-row">
                    <div class="column-elem">
                        <p class="fe-ce-header bg-warning bg-gradient">Paese</p>
                        <p class="bg-light bg-gradient">{{ $response['flighteventbook']['country'] }}</p>
                    </div>
                </div>
                <div class="flighteventbook-row">
                    <div class="column-elem">
                        <p class="fe-ce-header bg-warning bg-gradient">Città</p>
                        <p class="bg-light bg-gradient">{{ $response['flighteventbook']['city'] }}</p>
                    </div>
                </div>
                <div class="flighteventbook-row">
                    <div class="column-elem">
                        <p class="fe-ce-header bg-warning bg-gradient">Data evento</p>
                        <p class="bg-light bg-gradient">{{ $response['flighteventbook']['date'] }}</p>
                    </div>
                </div>
                <div class="flighteventbook-row">
                    <div class="column-elem">
                        <p class="fe-ce-header bg-warning bg-gradient">Numero biglietti</p>
                        <p class="bg-light bg-gradient">{{ $response['flighteventbook']['tickets'] }}</p>
                    </div>
                </div>
                <div class="flighteventbook-row">
                    <div class="column-elem">
                        <p class="fe-ce-header bg-warning bg-gradient">Prezzo totale</p>
                        <p class="bg-light bg-gradient">{{ $response['flighteventbook']['price'] }}€</p>
                    </div>
                </div>
            </div>
            <div class="form-button my-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg">PRENOTA</button>
            </div>
        </form>
    @elseif($done == false)
        @isset($message)
            <x-alert classes="alert alert-danger" :message="$message" />
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