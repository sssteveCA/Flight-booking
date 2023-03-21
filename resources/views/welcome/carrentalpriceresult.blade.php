@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Prezzo auto noleggio scelta')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/welcome/carrentalpriceresult.css') }}">
@endsection

@section('scripts')
    @parent
@endsection

@section('content')
    @include(P::VIEW_BACKBUTTON,[
        'back_image' => '/img/back.png',
        'back_url' => '../'
    ])
    @if($done == true)
    <form id="fCrPrice" method="post" action="#">
        @csrf
        @method('POST')
        <input type="hidden" name="session_id" value="">
        <div class="carrental-div">
            <div class="carrental-header bg-success bg-gradient">Preventivo noleggio auto</div>
            <div class="carrental-row">
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Nome compagnia</p>
                    <p class="bg-light bg-gradient">{{ $data['company_name'] }}</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Modello auto</p>
                    <p class="bg-light bg-gradient">{{ $data['car_name'] }}</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">La tua fascia d'età</p>
                    <p class="bg-light bg-gradient">{{ $data['age_range'] }} anni</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Data di ritiro</p>
                    <p class="bg-light bg-gradient">{{ $data['rentstart_date'] }}</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Data di consegna</p>
                    <p class="bg-light bg-gradient">{{ $data['rentend_date'] }}</p>
                </div>
                <div class="column-elem">
                    <p class="cr-ce-header bg-warning bg-gradient">Prezzo</p>
                    <p class="bg-light bg-gradient">{{ $data['total_price'] }}€</p>
                </div>
            </div>
        </div>
        <div class="form-button my-4 text-center">
            <button type="submit" class="btn btn-primary btn-lg">PRENOTA</button>
        </div>
    </form>
    
    @elseif($done == false)
        @isset($message)
            <x-alert classes="alert alert-danger" :message="$message" />
        @endisset
    @endif
    @isset($errors)
        @foreach($errors as $k => $input_errors)
            @foreach($input_errors as $k => $error)
                <x-alert classes="alert alert-danger" :message="$error" />
            @endforeach
        @endforeach
    @endisset
    {{--   @php
            echo '<pre>';
            var_dump($data);
            echo '</pre>';
    @endphp --}}
@endsection