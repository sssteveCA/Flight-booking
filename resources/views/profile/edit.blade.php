@extends('layouts.menu')

@section('content')

<div class="container">
      <div class="jumbotron mt-3">
        <h1>{{isset($title)? $title : ''}}</h1>
        <p class="lead">{{isset($message)? $message : ''}}</p>
      </div>
    </div>
@endsection