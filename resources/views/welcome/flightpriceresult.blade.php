@extends('../layouts.menu')

@section('title','Prezzo volo scelto')

@section('links')
@endsection

@section('scripts')
@endsection

@section('content')
    @isset($inputs)
        @php
            echo '<pre>';
            var_dump($inputs);
            echo '</pre>';
        @endphp
    @endisset
    @isset($flights)
        @php
            echo '<pre>';
            var_dump($flights);
            echo '</pre>';
        @endphp
    @endisset
    @isset($errors)
        @foreach($errors as $k => $input_errors)
            @foreach($input_errors as $k => $msg)
                <div class="alert alert-danger" role="alert">{{$msg}}</div>
            @endforeach
        @endforeach
    @endisset
    @isset($errors_array)
        @foreach($errors_array as $error)
            <div class="alert alert-danger" role="alert">{{$error}}</div>
        @endforeach
    @endisset
    
@endsection