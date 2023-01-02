@extends('layouts.menu')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Le mie stanze')

@section('links')
@endsection

@section('scripts')
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON, ['back_image' => '../../img/back.png', 'back_url' => '../../'])
@endsection