@extends('layouts.menu')

@section('title','Errore')

@section('content')
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