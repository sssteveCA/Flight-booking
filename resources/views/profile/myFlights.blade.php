@extends('layouts.menu')

@section('title','I miei voli')

@section('content')
    @if($flights_number > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                <tr>
                    <th scope="col">{{ $flight['id'] }}</th>
                    <td>Da {{$flight['departure_airport']}} a {{$flight['arrival_airport']}}</td>
                    <td>
                        <form class="fFlightGet" method="get" action="#">
                            <button type="submit" class="btn btn-primary">VEDI</button>
                        </form>
                    </td>
                    <td>
                        <form class="fFlightDelete" method="post" action="#">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ELIMINA</button>
                        </form>
                    </td>
                    <td>
                        <form class="fFlightBook" method="post" action="#">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-success">PRENOTA</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        @isset($message)
        <div class="container mt-5">
            <h2 class="mt-5 text-center">Lista voli vuota</h2>
            <p class="lead text-center">{{$message}}</p>
        </div>
        @endisset
    @endif
@endsection