@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('title','I miei voli')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/profile/myFlights.css') }}">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/profile/myFlights.js') }}"></script>
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../../" />
    @if($done == true)
        @if($empty == false)
            <div id="flights-container" class="container-fluid">
            @foreach($flights as $flight)
                <div class="row justify-content-center justify-content-lg-start">
                    <div class="col-2 col-lg-1 flight-id">
                        <span class="flight-title-style">ID:</span> {{ $flight['id'] }}
                    </div>
                    <div class="col-10 col-lg-5 flight-name">
                        <span class="flight-title-style">NOME:</span> Da {{$flight['departure_airport']}} a {{$flight['arrival_airport']}}
                    </div>   
                    <div class="col-12 col-sm-4 col-lg-2 flight-show d-flex justify-content-center justify-content-sm-start">
                        <form class="fFlightGet" method="get" action="{{ route('myFlights.show',['myFlight' => $flight['id']]) }}">
                            <button type="submit" class="btn btn-primary">VEDI</button>
                        </form>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-2 flight-delete d-flex justify-content-center justify-content-sm-start">
                        <form class="fFlightDelete" method="post" action="{{ route('myFlights.destroy', ['myFlight' => $flight['id']]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="flight_id" value="{{ $flight['id'] }}">
                            <button type="submit" class="btn btn-danger ms-5 ms-sm-0">ELIMINA</button>
                        </form>
                        <div class="text-center ms-4">
                            <div class="spinner-border text-primary d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-2 flight-book d-flex justify-content-center justify-content-sm-start">
                        @if($flight['payed'] == '0')
                        <form class="fFlightBook" method="post" action="{{ route(P::ROUTE_RESUMEFLIGHT) }}">
                            @csrf
                            @method('POST')
                            <!-- Informazioni sul volo da prenotare -->
                            <input type="hidden" name="flight_id" value="{{ $flight['id'] }}">
                            <button type="submit" class="btn btn-success">PRENOTA</button>
                        </form>  
                        @endif
                    </div>        
                </div>
            @endforeach
            </div>
        @else
            <x-message-container  title="Lista voli vuota" :message="$message" />
        @endif
    @else
        <x-alert classes="alert alert-danger" :message="$message" />
    @endif
@endsection