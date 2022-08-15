<div class="d-none">
    @if(isset($_REQUEST['session_id']))
        <input type="hidden" name="session_id" value="{{ $_REQUEST['session_id'] }}">
    @endif
    @if(isset($_REQUEST['flight_type']))
        <input type="hidden" name="flight_type" value="{{ $_REQUEST['flight_type'] }}">
    @endif
    @if(isset($_REQUEST['flights']))
        @foreach($_REQUEST['flights'] as $type => $flight)
            @foreach($flight as $attr => $value)
                <input type="hidden" name="flights[{{ $type }}][{{ $attr }}] " value="{{ $value }}">
            @endforeach
        @endforeach
    @endif
</div>