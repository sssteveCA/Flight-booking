@extends('../layouts.menu')

@section('title','Prezzo volo scelto')

@section('links')
@endsection

@section('scripts')
@endsection

@section('content')
    @isset($response['flight_type'])
        <form id="fFlight" method="post" action="#">
            @foreach($response['flights'] as $type => $flight)
            <div class="flight-div">
                @if($type == 'outbound')
                    <div class="flight-type">Volo di andata</div>
                @elseif($type == 'return')
                    <div class="flight-type">Volo di ritorno</div>
                @else
                    <div class="flight-type">Volo di sola andata</div>
                @endif
                <div class="flight-row">
                    <div class="company column-elem">
                        <p class="fl-header">Compagnia aerea</p>
                        <p>{{$flight['company_name']}}</p>
                    </div>
                    <div class="date column-elem">
                        <p class="fl-header">Data e orario</p>
                        <p>{{$flight['flight_date'].' '.$flight['hours']}}</p>
                    </div>
                    <div class="departure-loc column-elem">
                        <p class="fl-header">Luogo di partenza</p>
                        <p>{{$flight['departure_country'].', '.$flight['departure_airport']}}</p>
                    </div>
                    <div class="arrival-loc column-elem">
                        <p class="fl-header">Luogo di arrivo</p>
                        <p>{{$flight['arrival_country'].', '.$flight['arrival_airport']}}</p>
                    </div>
                    <div class="price column-elem">
                        <p class="fl-header">Prezzo</p>
                        <p>{{$flight['total_price']}}€</p>
                    </div>
                </div> 
            </div>
            @endforeach
            <div class="form-button">
                <button type="submit" class="btn btn-primary btn-lg">PRENOTA</button>
            </div>
        </form>
    @endisset
    {{-- @isset($response['inputs'])
        @php
            echo '<pre>';
            var_dump($response['inputs']);
            echo '</pre>';
        @endphp
    @endisset
    @isset($response['flights']
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