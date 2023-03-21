@extends('layouts.page')

@section('content')
    <div class="container mt-5">
        <h2 class="mt-5 text-center">Prenotazione volo</h2>
        @if(isset($payment) and $payment == 'completed')
            <p class="lead text-center">{{ $message }}</p>
        @else
            <x-alert classes="alert alert-danger" :message="$message" />
        @endif
    </div>
@endsection