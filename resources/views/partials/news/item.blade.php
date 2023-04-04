<x-news.post-list-item-component
    :excerpt="$post['excerpt']"
    :post_route="route('news.show',['permalink' => $post['permalink']])"
    :title="$post['title']"
    :updated_at="$post['updated_at']"
 />
