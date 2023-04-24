@extends('layouts.page')

 @title('title','Registrazione')

@section('content')
    @isset($message)
        <x-message-container  title="Registrazione account" :message="$message" />
    @endisset
@endsection