@extends('layouts.menu')

@section('namespaces')
    @php
       use App\Interfaces\Paths as P; 
    @endphp
@endsection

@section('title','Prezzo albergo scelto')

@section('links')
@endsection

@section('scripts')
@endsection

@section('content')
    @isset($errors)
        @foreach($errors as $k => $input_errors)
            @foreach($input_errors as $k => $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
            @endforeach
        @endforeach
    @endisset
    @isset($error_message)
        <div class="alert alert-danger" role="alert">{{$error_message}}</div>
    @endisset
@endsection
