@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/news/post.css') }}">
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../news" />
    @isset($post)
        <x-news.post-component 
            :title="$post['title']" 
            :content="$post['content']" 
            :categories="$post['categories']"
            :tags="$post['tags']"
            :created_at="$post['created_at']"
            :updated_at="$post['updated_at']"
        />
    @endisset
@endsection