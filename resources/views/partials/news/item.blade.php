<div class="post-item text-center">
    <a class="post-link" href="{{ route('news.show',['permalink' => $post['permalink']]) }}">
        <div class="post-div">
            <div class="post-header">
                <h3>{{ $post['title'] }}</h3>
            </div>
            <div class="post-excerpt">
                {{ $post['excerpt'] }}
            </div>
            <div class="post-last-modified">
                <span class="fw-bold">Ultima modifica</span>
                <span> {{ $post['updated_at'] }} </span>
            </div>
        </div>
    </a>
</div>