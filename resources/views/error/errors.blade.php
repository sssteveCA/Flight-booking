@extends('layouts.menu')

@section('content')
@isset($messages)
<h3 class="text-center">Errore</h3>
<div class="alert alert-danger" role="alert">
    <ul>
    @foreach($messages as $message)
        <li>{{$message}}</li>
    @endforeach
    </ul>
</div>
@endisset
@endsection