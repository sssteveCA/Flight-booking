@extends('layouts.menu')

@section('title','Contatti')

@section('links')
<link rel="stylesheet" href="{{ asset('css/contacts.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">{{ __('Contatti') }}</div>
                <div class="card-body">
                    <form id="fContacts" method="POST" action="{{ route('register') }}">
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
                                <input id="subject" type="text" class="form-control" name="password_confirmation">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection