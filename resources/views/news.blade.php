@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','News')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,['back_image' => '../img/back.png', 'back_url' => '../'])
    @if(isset($n_posts,$posts))
        <x-alert class="mt-5 alert alert-secondary" message="Nessuna notizia da mostrare" />
    @endif
    @if(isset($status) && $status == 'ERROR')
        <x-alert class="mt-5 alert alert-danger" :message="$message" />
    @endif
@endsection