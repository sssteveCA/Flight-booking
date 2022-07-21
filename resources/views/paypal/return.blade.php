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
    @isset($payment)
        <div class="container mt-5">
            <h2 class="mt-5 text-center">Prenotazione volo</h2>
            @if($payment == 'completed')
            <p class="lead text-center">{{ $message }}</p>
            @else if($payment == 'refused')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @endif
        </div>
    @endisset
@endsection