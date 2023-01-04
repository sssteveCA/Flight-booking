@extends('layouts.page')

@section('content')
    <div class="container mt-5">
            <h2 class="mt-5 text-center">Prenotazione volo</h2>
            @if(isset($payment) and $payment == 'completed')
                <p class="lead text-center">{{ $message }}</p>
            @else
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @endif
    </div>
@endsection