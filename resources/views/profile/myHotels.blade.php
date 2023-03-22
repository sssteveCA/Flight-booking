@extends('layouts.page')

@section('namespaces')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Le mie stanze')

@section('links')
    @parent
    <link rel="stylesheet" href="{{ asset('css/profile/myHotels.css')}}">
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/profile/myHotels.js') }}"></script>
@endsection

@section('content')
    <x-back-button back_image="/img/back.png" back_url="../../" />
    @if($done == true)
        @if($empty == false)
        <div class="container-fluid">
            @foreach($hotels as $hotel)
            <div class="row justify-content-center justify-content-lg-start">
                <div class="col-2 col-lg-1 hotel-id">
                    <span class="hotel-title-style">ID:</span>{{ $hotel['id'] }}
                </div>
                <div class="col-10 col-lg-5 hotel-name">
                    <span class="hotel-title-style">HOTEL:</span>
                    {{ $hotel['hotel'] }}
                </div>
                <div class="col-12 col-sm-4 col-lg-2 hotel-show d-flex justify-content-center justify-content-sm-start">
                    <form class="fHotelGet" method="get" action="{{ route('myHotels.show',['myHotel' => $hotel['id']]) }}">
                        <button type="submit" class="btn btn-primary">VEDI</button>
                    </form>
                </div>
                <div class="col-12 col-sm-4 col-lg-2 hotel-delete d-flex justify-content-center justify-content-sm-start">
                    <form class="fHotelDelete" method="post" action="{{ route('myHotels.destroy', ['myHotel' => $hotel['id']]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="hotel_id" value="{{ $hotel['id'] }}">
                        <button type="submit" class="btn btn-danger ms-5 ms-sm-0">ELIMINA</button>
                    </form>
                    <div class="text-center ms-4">
                        <div class="spinner-border text-primary d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 col-lg-2 hotel-book d-flex justify-content-center justify-content-sm-start">
                    @if($hotel['payed'] == '0')
                    <form class="fHotelBook" method="post" action="{{ route(P::ROUTE_RESUMEHOTEL) }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="hotel_id" value="{{ $hotel['id'] }}">
                        <button type="submit" class="btn btn-success">PRENOTA</button>
                    </form>    
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
            <x-message-container  title="Lista stanze vuota" :message="$message" />
        @endif
    @else
        <x-alert classes="alert alert-danger" :message="$message" /> 
    @endif
@endsection