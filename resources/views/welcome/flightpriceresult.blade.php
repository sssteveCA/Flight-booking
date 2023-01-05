@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P; 
        use Illuminate\Support\Facades\Log;
    @endphp
@endsection

@section('title','Prezzo volo scelto')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/welcome/flightpriceresult.css') }} ">
@endsection

@section('scripts')
    @parent
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,['back_image' => '../img/back.png', 'back_url' => '../'])
    @isset($response['flight_type'])
        <form id="fFlightPrice" method="post" action="{{ route(P::ROUTE_BOOKFLIGHT) }}">
            @csrf
            @method('POST')
            <input type="hidden" name="session_id" value="{{ $response['session_id'] }}">
            @foreach($response['flights'] as $type => $flight)
            <div class="flight-div">
                @if($type == 'outbound')
                    <div class="flight-type bg-success bg-gradient">Volo di andata</div>
                @elseif($type == 'return')
                    <div class="flight-type bg-success bg-gradient">Volo di ritorno</div>
                @else
                    <div class="flight-type bg-success bg-gradient">Volo di sola andata</div>
                @endif
                <div class="flight-row">
                    <div class="company column-elem">
                        <p class="fl-header bg-warning bg-gradient">Compagnia aerea</p>
                        <p class="bg-light bg-gradient">{{$flight['company_name']}}</p>
                    </div>
                    <div class="date column-elem">
                        <p class="fl-header bg-warning bg-gradient">Data e orario</p>
                        <p class="bg-light bg-gradient">{{$flight['flight_date'].' '.$flight['flight_time']}}</p>
                    </div>
                    <div class="departure-loc column-elem">
                        <p class="fl-header bg-warning bg-gradient">Luogo di partenza</p>
                        <p class="bg-light bg-gradient">{{$flight['departure_country'].', '.$flight['departure_airport']}}</p>
                    </div>
                    <div class="arrival-loc column-elem">
                        <p class="fl-header bg-warning bg-gradient">Luogo di arrivo</p>
                        <p class="bg-light bg-gradient">{{$flight['arrival_country'].', '.$flight['arrival_airport']}}</p>
                    </div>
                    <div class="adults-div column-elem">
                        <p class="fl-header bg-warning bg-gradient">Adulti</p>
                        <p class="bg-light bg-gradient">{{ $flight['adults'] }}</p>
                    </div>
                    <div class="teenagers-div column-elem">
                        <p class="fl-header bg-warning bg-gradient">Adolescenti</p>
                        <p class="bg-light bg-gradient">{{ $flight['teenagers'] }}</p>
                    </div>
                    <div class="children-div column-elem">
                        <p class="fl-header bg-warning bg-gradient">Bambini</p>
                        <p class="bg-light bg-gradient">{{ $flight['children'] }}</p>
                    </div>
                    <div class="newborns-div column-elem">
                        <p class="fl-header bg-warning bg-gradient">Neonati</p>
                        <p class="bg-light bg-gradient">{{ $flight['newborns'] }}</p>
                    </div>
                    <div class="price column-elem">
                        <p class="fl-header bg-warning bg-gradient">Prezzo</p>
                        <p class="bg-light bg-gradient">{{$flight['flight_price']}}€</p>
                    </div>
                </div> 
            </div>
            @endforeach
            <div class="form-button my-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg">PRENOTA</button>
            </div>
        </form>
    @endisset
    @isset($errors)
        @foreach($errors as $k => $input_errors)
            @foreach($input_errors as $k => $msg)
                <div class="alert alert-danger" role="alert">{{$msg}}</div>
            @endforeach
        @endforeach
    @endisset
    @isset($errors_array)
        @foreach($errors_array as $error)
            <div class="alert alert-danger" role="alert">{{$error}}</div>
        @endforeach
    @endisset
@endsection