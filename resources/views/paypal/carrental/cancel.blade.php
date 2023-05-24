@extends('layouts.page')

@section('content')
    @isset($message)
        <x-message-container title="Pagamento auto" :message="$message" />
    @endisset
@endsection