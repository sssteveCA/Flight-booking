@extends('layouts.page')

@section('content')
    @isset($message)
        <x-message-container  title="Pagamento volo" :message="$message" />
    @endisset
@endsection