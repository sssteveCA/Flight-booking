@extends('layouts.menu')

@section('content')
    @isset($message)
        <div class="container mt-5">
            <h2 class="mt-5 text-center">Registrazione account</h2>
            <p class="lead text-center">{{$message}}</p>
        </div>
    @endisset
@endsection