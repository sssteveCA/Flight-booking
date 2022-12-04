@extends('layouts.menu')

@section('namespace')
    @php
        use App\Interfaces\Paths as P;
    @endphp
@endsection

@section('title','Paga le stanze dell'albergo prenotate')

@section('content')
    <div class="container mt-5">
        <h2 class="mt-5 text-center">Prenotazione stanze d'albergo</h2>
        <p class="lead text-center"></p>
    </div>
    <div class="form-div">
        <form id="fHotelPrice" method="post" action="">
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">PAGA</button>
            </div>
        </form>
    </div>
@endsection