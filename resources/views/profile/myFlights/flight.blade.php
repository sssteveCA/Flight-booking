@extends('layouts.menu')

@section('title','Informazioni volo')

@section('content')
    @isset($flight)
        @php
            echo '<pre>';
            var_dump($flight);
            echo '</pre>';
        @endphp
    @endisset
@endsection