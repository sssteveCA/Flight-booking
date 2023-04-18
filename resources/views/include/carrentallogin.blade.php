<div class="d-none">
    @if(isset($_REQUEST['carrental']))
        @foreach($_REQUEST['carrental'] as $attr => $value)
            <input type="hidden" name="carrental[{{ $attr }}]" value="{{ $value }}">
        @endforeach
    @endif
</div>