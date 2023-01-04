@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Chi siamo')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,['back_image' => '../img/back.png', 'back_url' => '../'])
    <div class="container-fluid">
        <div class="row flex-column justify-content-center">
            <div class="offset-1 offset-md-2 offset-lg-3 col-10 col-md-8 col-lg-6 text-center img-container">
                <img src="{{ asset('img/flightbooking-logo.png') }}" alt="Logo FlightBooking" title="Logo FlightBooking">
            </div>
        </div>
        <div class="row flex-column justify-content-center">
            <div class="offset-md-1 offset-lg-2 col-12 col-md-10 col-lg-8 text-center description">
                <div>
                    Flight Booking è un sito dove è possibile organizzare una vacanza in modo completo.
                </div>
                <div>
                    Permette di prenotare uno o più voli con una compagnia aerea a propria scelta, oltre ad avere la possibilità di prenotare anche un soggiorno in albergo e una macchina a noleggio.
                </div>
                <div>
                    Infine ti consente anche di rimanere aggiornato sull'andamento dei prezzi delle compagnie aeree, occasionali sconti, eventi, informazioni sulla disponibilità delle tratte aeree e molto altro ancora.
                </div>
                <div>
                    Se vuoi maggiori informazioni o hai dei dubbi puoi richiedere assistenza nella pagina dei <a href="{{ url(P::URL_CONTACTS) }}">Contatti</a>.
                </div>
            </div>
        </div>
    </div>
@endsection