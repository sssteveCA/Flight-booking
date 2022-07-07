@extends('../layouts.menu')

@section('title','Prezzo volo scelto')

@section('links')
@endsection

@section('scripts')
@endsection

@section('content')
    @php
        if(isset($inputs))
            var_dump($inputs);
        if(isset($errors))
            var_dump($errors);
    @endphp
@endsection