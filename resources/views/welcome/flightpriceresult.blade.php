@extends('layouts.menu')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P; 
        use Illuminate\Support\Facades\Log;
    @endphp
@endsection

@section('title','Prezzo volo scelto')

@section('links')
<link rel="stylesheet" href="{{ asset('css/welcome/flightpriceresult.css') }} ">
@endsection

@section('scripts')
@endsection

@section('content')
    @isset($response['flight_type'])
        @php
            Log::channel('stdout')->debug("Flightpriceresult blade");
            Log::channel('stdout')->debug("Flightpriceresult blade response => ".var_export($response,true));
        @endphp
        <form id="fFlightPrice" method="post" action="{{ route(P::ROUTE_BOOKFLIGHT) }}">
            @csrf
            @method('POST')
            <input type="hidden" name="flight_type" value="{{ $response['flight_type'] }}">
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
                        <input type="hidden" name="flights[{{ $type }}][company_name]" value="{{ $flight['company_name'] }}">
                    </div>
                    <div class="date column-elem">
                        <p class="fl-header bg-warning bg-gradient">Data e orario</p>
                        <p class="bg-light bg-gradient">{{$flight['flight_date'].' '.$flight['flight_time']}}</p>
                        <input type="hidden" name="flights[{{ $type }}][booking_date]" value="{{ $flight['booking_date'] }}">
                        <input type="hidden" name="flights[{{ $type }}][flight_date]" value="{{ $flight['flight_date'] }}">
                        <input type="hidden" name="flights[{{ $type }}][flight_time]" value="{{ $flight['flight_time'] }}">
                    </div>
                    <div class="departure-loc column-elem">
                        <p class="fl-header bg-warning bg-gradient">Luogo di partenza</p>
                        <p class="bg-light bg-gradient">{{$flight['departure_country'].', '.$flight['departure_airport']}}</p>
                        <input type="hidden" name="flights[{{ $type }}][departure_country]" value="{{ $flight['departure_country'] }}">
                        <input type="hidden" name="flights[{{ $type }}][departure_airport]" value="{{ $flight['departure_airport'] }}">
                    </div>
                    <div class="arrival-loc column-elem">
                        <p class="fl-header bg-warning bg-gradient">Luogo di arrivo</p>
                        <p class="bg-light bg-gradient">{{$flight['arrival_country'].', '.$flight['arrival_airport']}}</p>
                        <input type="hidden" name="flights[{{ $type }}][arrival_country]" value="{{ $flight['arrival_country'] }}">
                        <input type="hidden" name="flights[{{ $type }}][arrival_airport]" value="{{ $flight['arrival_airport'] }}">
                    </div>
                    <div class="adults-div column-elem">
                        <p class="fl-header bg-warning bg-gradient">Adulti</p>
                        <p class="bg-light bg-gradient">{{ $flight['adults'] }}</p>
                        <input type="hidden" name="flights[{{ $type }}][adults]" value="{{ $flight['adults'] }}">
                    </div>
                    <div class="teenagers-div column-elem">
                        <p class="fl-header bg-warning bg-gradient">Adolescenti</p>
                        <p class="bg-light bg-gradient">{{ $flight['teenagers'] }}</p>
                        <input type="hidden" name="flights[{{ $type }}][teenagers]" value="{{ $flight['teenagers'] }}">
                    </div>
                    <div class="children-div column-elem">
                        <p class="fl-header bg-warning bg-gradient">Bambini</p>
                        <p class="bg-light bg-gradient">{{ $flight['children'] }}</p>
                        <input type="hidden" name="flights[{{ $type }}][children]" value="{{ $flight['children'] }}">
                    </div>
                    <div class="newborns-div column-elem">
                        <p class="fl-header bg-warning bg-gradient">Neonati</p>
                        <p class="bg-light bg-gradient">{{ $flight['newborns'] }}</p>
                        <input type="hidden" name="flights[{{ $type }}][newborns]" value="{{ $flight['newborns'] }}">
                    </div>
                    <div class="price column-elem">
                        <p class="fl-header bg-warning bg-gradient">Prezzo</p>
                        <p class="bg-light bg-gradient">{{$flight['total_price']}}€</p>
                        <input type="hidden" name="flights[{{ $type }}][total_price]" value="{{ $flight['total_price'] }}">
                    </div>
                </div> 
            </div>
            @endforeach
            <div class="form-button my-4 text-center">
                <button type="submit" class="btn btn-primary btn-lg">PRENOTA</button>
            </div>
        </form>
    @endisset
    @php
        $data = session()->all();
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    @endphp
    {{-- @isset($response['flights']
        @php
            echo '<pre>';
            var_dump($response['flights'];
            echo '</pre>';
        @endphp
    @endisset --}}
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