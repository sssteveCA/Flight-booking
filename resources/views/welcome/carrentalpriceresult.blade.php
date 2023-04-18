@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Prezzo auto noleggio scelta')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/welcome/carrentalpriceresult.css') }}">
@endsection

@section('scripts')
    @parent
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../" />
    @if($done == true)
    <form id="fCrPrice" method="post" action="{{ route(P::ROUTE_BOOKCARRENTAL) }}">
        @csrf
        @method('POST')
        <input type="hidden" name="session_id" value="{{$response['carrental']['session_id']}}">
        <div class="carrental-div">
            <div class="carrental-header bg-success bg-gradient">Preventivo noleggio auto</div>
            <div class="carrental-row">
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Nome compagnia</p>
                    <p class="bg-light bg-gradient">{{ $response['carrental']['company_name'] }}</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Modello auto</p>
                    <p class="bg-light bg-gradient">{{ $response['carrental']['car_name'] }}</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">La tua fascia d'età</p>
                    <p class="bg-light bg-gradient">{{ $response['carrental']['age_range'] }} anni</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Data di ritiro</p>
                    <p class="bg-light bg-gradient">{{ $response['carrental']['rentstart_date'] }}</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Data di consegna</p>
                    <p class="bg-light bg-gradient">{{ $response['carrental']['rentend_date'] }}</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Prezzo</p>
                    <p class="bg-light bg-gradient">{{ $response['carrental']['total_price'] }}€</p>
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
    {{--   @php
            echo '<pre>';
            var_dump($response['carrental']);
            echo '</pre>';
    @endphp --}}
@endsection