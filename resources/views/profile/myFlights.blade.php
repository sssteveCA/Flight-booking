@extends('layouts.menu')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('title','I miei voli')

@section('content')
    @if($flights_number > 0)
        <div class="container-fluid">
            @foreach($flights as $flight)
                <div class="row justify-content-center justify-content-lg-start">
                    <div class="col-2 col-lg-1 flight-id">
                        <span class="flight-title-style">ID:</span> {{ $flight['id'] }}
                    </div>
                    <div class="col-10 col-lg-5 flight-name">
                        <span class="flight-title-style">NOME</span> Da {{$flight['departure_airport']}} a {{$flight['arrival_airport']}}
                    </div>   
                    <div class="col-4 col-lg-2 flight-show">
                        <form class="fFlightGet" method="get" action="{{ route('myFlights.show',['myFlight' => $flight['id']]) }}">
                            <button type="submit" class="btn btn-primary">VEDI</button>
                        </form>
                    </div>
                    <div class="col-4 col-lg-2 flight-delete">
                        <form class="fFlightDelete" method="post" action="#">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="flight_id" value="{{ $flight['id'] }}">
                            <button type="submit" class="btn btn-danger">ELIMINA</button>
                        </form>
                    </div>
                    <div class="col-4 col-lg-2 flight-book">
                        <form class="fFlightBook" method="post" action="{{ route(P::ROUTE_FLIGHTPRICE) }}">
                            @csrf
                            @method('POST')
                            <!-- Informazioni sul volo da prenotare -->
                            <button type="submit" class="btn btn-success">PRENOTA</button>
                        </form>  
                    </div>        
                </div>
            @endforeach
        </div>
    @else
        @isset($message)
        <div class="container mt-5">
            <h2 class="mt-5 text-center">Lista voli vuota</h2>
            <p class="lead text-center">{{$message}}</p>
        </div>
        @endisset
    @endif
@endsection