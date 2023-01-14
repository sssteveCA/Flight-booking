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
    @include(P::VIEW_BACKBUTTON,['back_image' => '../../img/back.png', 'back_url' => '../news'])
    @isset($post)
        <div class="container-fluid">
            <div class="row row-title">
                <div class="col-12">
                    <h2 class="text-center">{{ $post['title'] }}</h2>
                </div>
            </div>
            <div class="row row-content">
                <div class="col-12 col-md-10 offset-md-1">
                    @php
                        echo $post['content'];
                    @endphp
                </div>
            </div>
            <div class="row row-info flex-column justify-content-center flex-md-row justify-content-md-between mt-5">
                <div class="col-12 col-md-6">
                    <span class="fw-bold">CATEGORIE:</span>
                    <span>{{ $post['categories'] }}</span>
                </div>
                <div class="col-12 col-md-6">
                    <span class="fw-bold">TAG:</span>
                    <span>{{ $post['tags'] }}</span>
                </div>
            </div>
            <div class="row flex-column justify-content-center flex-md-row justify-content-md-between">
                <div class="col-12 col-md-6">
                    <span class="fw-bold">DATA DI CREAZIONE:</span>
                    <span>{{ $post['created_at'] }}</span>
                </div>
                <div class="col-12 col-md-6">
                    <span class="fw-bold">UTLIMO AGGIORNAMENTO:</span>
                    <span>{{ $post['updated_at'] }}</span>
                </div>
            </div>
        </div>
    @endisset
@endsection