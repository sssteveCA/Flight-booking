<div class="d-none">
    @if(isset($_REQUEST['hotel']))
        @foreach($_REQUEST['hotel'] as $attr => $value)
            <input type="hidden" name="hotel[{{ $attr }}]" value="{{ $value }}">
        @endforeach
    @endif
</div>