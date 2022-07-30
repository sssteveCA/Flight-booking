@extends('layouts.menu')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Modifica profilo')

@section('links')
<link rel="stylesheet" href="{{ asset('css/profile/info.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/profile/info.js') }}"></script>
@endsection

@section('content')
    @include(P::VIEW_PROFILE_INFO_EUF)
    @include(P::VIEW_PROFILE_INFO_EPF)
    @include(P::VIEW_PROFILE_INFO_DA)
@endsection