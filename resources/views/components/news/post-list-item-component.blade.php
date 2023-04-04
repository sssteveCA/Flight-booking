<div class="post-item text-center">
    <a class="post-link" href="{{ $attributes['post_route'] }}">
        <div class="post-div">
            <div class="post-header">
                <h3>{{ $attributes['title'] }}</h3>
            </div>
            <div class="post-excerpt">
                {{ $attributes['excerpt'] }}
            </div>
            <div class="post-last-modified">
                <span class="fw-bold">Ultima modifica</span>
                <span> {{ $attributes['updated_at'] }} </span>
            </div>
        </div>
    </a>
</div>