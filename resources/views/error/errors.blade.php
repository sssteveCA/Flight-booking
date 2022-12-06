@extends('layouts.menu')

@section('namespace')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Errore')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/error/errors.css') }}">
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,['back_image' => '../img/back.png', 'back_url' => '../'])
    @if(isset($messages) || isset($message))
    <h3 class="text-center">Errore</h3>
    <div class="alert alert-danger" role="alert">
        <ul>
        @isset($message)
            <li>{{$message}}</li>
        @endisset
        @isset($messages)
            @foreach($messages as $message)
                <li>{{$message}}</li>
            @endforeach
        @endisset
        </ul>
    </div>
    @endif
@endsection