@extends('layouts.app')

@section('content')

<div class="container">
      <div class="jumbotron mt-3">
        <h1>{{isset($title)? $title : ''}}</h1>
        <p class="lead">{{isset($msg)? $msg : ''}}</p>
      </div>
    </div>
@endsection