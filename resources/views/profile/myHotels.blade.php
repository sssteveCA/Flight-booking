@extends('layouts.menu')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Le mie stanze')

@section('links')
<link rel="stylesheet" href="{{ asset('css/profile/myHotels.css')}}">
@endsection

@section('scripts')
<script src="{{ asset('js/profile/myHotels.js') }}"></script>
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON, ['back_image' => '../../img/back.png', 'back_url' => '../../'])
@endsection