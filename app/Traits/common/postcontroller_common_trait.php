<?php

namespace App\Traits\Common;

use App\Models\Post;
use App\Interfaces\Constants as C;

/**
 * This trait contain common code between PostController and PostControllerApi
 */
trait PostControllerCommonTrait{

    /**
     * Set the response data for PostController index method route
     */
    private function setIndexResponseData(): array{
        $posts = Post::orderBy('updated_at','DESC')->get();
        $n_posts = $posts->count();
        if($n_posts > 0){
            $posts_array = $posts->toArray();
            return [
                'code' => 200,
                'response' => [
                    C::KEY_DONE => true, C::KEY_EMPTY => false,
                    C::KEY_STATUS => 'OK', 'n_posts' => $n_posts,
                    'posts' => $posts_array
                ]
            ];
        }//if($n_posts > 0){
        return [
            'code' => 200,
            'response' => [
                C::KEY_DONE => true, C::KEY_EMPTY => true, C::KEY_STATUS => 'EMPTY',
                'n_posts' => $n_posts, 'posts' => [], C::KEY_MESSAGE => C::MESS_NOPOSTS
            ]
        ];
    }

    /**
     * Set the response data for PostController show method route
     */
    private function setShowResponseData($permalink, array $params): array{
        $post = Post::find($permalink);
        if($post != null)
            return [
                'code' => 200,
                'response' => [
                    C::KEY_DONE => true, C::KEY_STATUS => 'OK',
                    'post' => $post
                ]
            ];
        return [
            'code' => 404,
            'response' => [
                C::KEY_DONE => false, C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => $params['messages']['error']
            ]
        ];
    }
}
?>