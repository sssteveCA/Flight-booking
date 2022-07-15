@extends('layouts.menu')

@section('content')
    @if($errors->any())
<div class="starter-template">
        <h1>Errori: </h1>
        @foreach($errors->all() as $error)
        <p class="lead">{{$error}}</p>
        @endforeach
</div>
    @endif
@endsection