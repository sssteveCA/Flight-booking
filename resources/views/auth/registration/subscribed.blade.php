@extends('layouts.page')

@section('content')
    @isset($message)
        <x-message-container  title="Registrazione account" :message="$message" />
    @endisset
@endsection