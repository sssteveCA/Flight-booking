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
    @isset($n_posts,$posts)
        @each(P::VIEW_POST_ITEM,$posts,'post')
        @forelse($posts as $post)
            
        @empty
            @isset($message)
                <div class="mt-5 alert alert-secondary" role="alert">{{$message}}</div>
            @endisset
        @endforelse
    @endisset
    @if(isset($status) && $status == 'ERROR')
        <div class="mt-5 alert alert-danger" role="alert">{{$message}}</div>
    @endif
@endsection