@extends('layouts.page')

@section('content')
    @isset($message)
        <x-message-container  title="Pagamento stanze d'albergo" :message="$message" />
    @endisset
@endsection