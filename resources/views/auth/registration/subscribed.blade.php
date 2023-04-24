@extends('layouts.page')

@section('title','Registrazione')

@section('content')
    @isset($message)
        <x-message-container  title="Registrazione account" :message="$message" />
    @endisset
@endsection