@extends('../layouts.menu')

@section('title','Prezzo volo scelto')

@section('links')
@endsection

@section('scripts')
@endsection

@section('content')
    @isset($errors)
        @foreach($errors as $k => $input_errors)
            @foreach($input_errors as $k => $msg)
                <div class="alert alert-danger" role="alert">{{$msg}}</div>
            @endforeach
        @endforeach
    @endisset
    
@endsection