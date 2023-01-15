@extends('layout.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/flightevents/flightevent.css') }}">
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,['back_image' => '../../img/back.png', 'back_url' => '../../' ])
@endsection