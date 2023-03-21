@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Contatti')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/contacts.css') }}">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/contacts.js') }}"></script>
@endsection

@section('content')
<x-back-button back_image="/img/back.png" back_url="../" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">{{ __('Contatti') }}</div>
                <div class="card-body">
                    <form id="fContacts" method="POST" action="{{ url(P::URL_SENDEMAIL) }}">
                        @csrf
                        @method('POST')
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Il tuo nome') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Il tuo indirizzo Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('Oggetto') }}</label>
                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control" name="subject">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Messaggio') }}</label>
                            <div class="col-md-6">
                                <textarea id="message" name="message" class="form-control"></textarea> 
                            </div>
                        </div>         
                        <div class="row mb-0">
                            <div class="col-12 col-md-6 d-flex justify-content-center mt-2">
                                <button type="submit" class="btn btn-success">
                                    {{ __('INVIA') }}
                                </button>
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-center mt-2">
                                <button type="reset" class="btn btn-danger">
                                    {{ __('ANNULLA')}}
                                </button>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-12 col-md-6 d-flex justify-content-center mt-2">
                                <div id="contacts-spinner" class="spinner-border text-primary d-none" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection