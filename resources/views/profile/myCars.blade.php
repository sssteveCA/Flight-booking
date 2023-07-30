@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Auto noleggiate')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/profile/myCars.css') }}">
@endsection

@section('scripts')
    @parent
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../../" />
    @if($done == true)
        @if($empty == false)
            <div id="cars-container" class="container-fluid">
                @foreach($cars as $car)
                    <div class="row justify-content-center justify-content-lg-start">
                        <div class="col-2 col-lg-1 car-id">
                            <span class="car-title-style">ID:</span> {{ $car['id'] }}
                        </div>
                        <div class="col-10 col-lg-5 car-name">
                            <span class="car-title-style">NOME AUTO:</span> {{ $car['car_name'] }}
                        </div>
                        <div class="col-12 col-sm-4 col-lg-2 car-show d-flex justify-content-center justify-content-sm-start">
                            <form class="fCarGet" method="get" action="{{ route('myCars.show', ['myCar' => $car['id']]) }}">
                                <button type="submit" class="btn btn-primary">VEDI</button>
                            </form>
                        </div>
                        <div class="col-12 col-sm-4 col-lg-2 car-delete d-flex justify-content-center justify-content-sm-start">
                            <form class="fCarDelete" method="post" action="#">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="car_id" value="{{ $car['id'] }}">
                                <button type="submit" class="btn btn-danger ms-5 ms-sm-0">ELIMINA</button>
                            </form>
                            <div class="text-center ms-4">
                                <div class="spinner-border text-primary d-none" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-lg-2 car-book d-flex justify-content-center justify-content-sm-start">
                        @if($car['payed'] == 0)
                            <form class="fCarBook" method="post" action="#">
                                @csrf
                                @method('POST')
                                <!-- Informazioni sull'auto da prenotare -->
                                <input type="hidden" name="car_id" value="{{ $car['id'] }}">
                                <button type="submit" class="btn btn-success">PRENOTA</button>
                            </form> 
                        @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <x-message-container  title="Lista auto vuota" :message="$message" />
        @endif
    @else
        <x-alert classes="alert alert-danger" :message="$message" />
    @endif
@endsection

