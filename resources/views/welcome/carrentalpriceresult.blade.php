@extends('layouts.page')

@section('content')
    @if($done == true)
        @php
            echo '<pre>';
            var_dump($data);
            echo '</pre>';
        @endphp
    @elseif($done == false)
        @isset($message)
            <x-alert classes="alert alert-danger" :message="$message" />
        @endisset
    @endif
    @isset($errors)
        @foreach($errors as $k => $input_errors)
            @foreach($input_errors as $k => $error)
                <x-alert classes="alert alert-danger" :message="$error" />
            @endforeach
        @endforeach
    @endisset
@endsection