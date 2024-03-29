@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Modifica profilo')

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/profile/info.css') }}">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/profile/info.js') }}"></script>
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../../" />
    @if($done == true)
        @include(P::VIEW_PROFILE_INFO_SE)
        @include(P::VIEW_PROFILE_INFO_EUF)
        @include(P::VIEW_PROFILE_INFO_EPF)
        @include(P::VIEW_PROFILE_INFO_DA)
    @else
        <x-alert classes="alert alert-danger" :message="$message" />
    @endif
@endsection