@extends('layouts.menu')

@section('content')
    @isset($post_data)
        @php
            echo '<pre>';
            var_dump($post_data);
            echo '</pre>';
        @endphp
    @endisset
@endsection