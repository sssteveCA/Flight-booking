<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Interfaces\Paths as P;
use App\Interfaces\Constants as C;
use App\Traits\Common\PostControllerCommonTrait;
use Exception;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    use PostControllerCommonTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $posts = Post::orderBy('updated_at','DESC')->get();
            $n_posts = $posts->count();
            if($n_posts > 0){
                //There is at least one post
                $posts_array = $posts->toArray();
                return response()->view(P::VIEW_NEWS,[
                    'n_posts' => $n_posts,
                    'posts' => $posts_array
                ],200);
            }//if($n_posts > 0){
            //No post in the database
            return response()->view(P::VIEW_NEWS,[
                'n_posts' => $n_posts,
                'posts' => [],
                C::KEY_MESSAGE => C::MESS_NOPOSTS
            ],200);
        }catch(Exception $e){
            //Log::channel('stdout')->debug("News Exception ".var_export($e->getMessage(),true));
            return response()->view(P::VIEW_NEWS,[
                C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => C::ERR_NEWS
            ],500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,$permalink)
    {
        $post = Post::find($permalink);
        if($post != null){
            return response()->view(P::VIEW_POST,[
                'post' => $post
            ],200);
        }
        return response()->view(P::VIEW_FALLBACK,
            [
                C::KEY_MESSAGES => [C::ERR_URLNOTFOUND_NOTALLOWED]
            ],404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
