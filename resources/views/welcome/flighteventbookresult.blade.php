@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Prezzo totale per l\' evento scelto')

@section('links')
    @parent
@endsection

@section('scripts')
    @parent
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../" />
    @if($done == true)
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