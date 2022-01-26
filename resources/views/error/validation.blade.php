@extends('layouts.app')

@section('content')
{{ logger(var_export($errors->all(),true))}}
    @isset($messages)
<div class="starter-template">
        <h1>Errori: </h1>
        @foreach($messages as $k => $inputArray)
            @foreach($inputArray as $k => $messages)
                @foreach($messages as $message)
                <p class="lead">{{$message}}</p>
                @endforeach
            @endforeach
        @endforeach
</div>
    @endisset
@endsection