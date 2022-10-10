@extends('layouts.menu')

@section('content')
    {{-- @isset($post_data)
        @php
            echo '<pre>';
            var_dump($post_data);
            echo '</pre>';
        @endphp
    @endisset
    --}}
    <div class="container mt-5">
            <h2 class="mt-5 text-center">Prenotazione volo</h2>
            @if(isset($payment) and $payment == 'completed')
                <p class="lead text-center">{{ $message }}</p>
            @else
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @endif
    </div>
@endsection