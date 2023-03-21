@extends('layouts.page')

@section('namespace')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Errore')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/error/errors.css') }}">
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../" />
    @if(isset($messages) || isset($message))
    <h3 class="text-center">Errore</h3>
    <div class="alert alert-danger" role="alert">
        <ul>
        @isset($message)
            <x-alert classes="alert alert-danger" :message="$message" />
        @endisset
        @isset($messages)
            @foreach($messages as $message)
                <li><x-alert classes="alert alert-danger" :message="$message" /></li>
            @endforeach
        @endisset
        </ul>
    </div>
    @endif
@endsection