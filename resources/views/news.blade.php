@extends('layouts.menu')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','News')

@section('links')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,['back_image' => '../img/back.png', 'back_url' => '../'])
    @isset($n_posts,$posts)
        @forelse($posts as $post)
            <a class="post-link" href="{{ route('news.show',['permalink' => $post['permalink']]) }}">
                <div class="post-div">
                    <div class="post-header">
                        <h3>{{ $post['title'] }}</h3>
                    </div>
                    <div class="post-excerpt">
                        {{ $post['excerpt'] }}
                    </div>
                    <div class="post-last-modified">
                        <span class="fw-bold">Ultima modifica</span>
                        <span> {{ $post['updated_at'] }} </span>
                    </div>
                </div>
            </a>
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