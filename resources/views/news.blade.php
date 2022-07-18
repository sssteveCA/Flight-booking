@extends('layouts.menu')

@section('title','News')

@section('links')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endsection

@section('content')
    @isset($posts)
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
            <div class="mt-5 alert alert-secondary" role="alert">
            {{$message}}
            </div>
            @endisset
        @endforelse
    @endisset
@endsection