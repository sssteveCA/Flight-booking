@extends('layouts.app')

@section('content')
@if($errors->any())
<h3 class="text-center">Errori</h3>
<div class="alert alert-danger" role="alert">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
</div>
@endif
    </div>
@endsection