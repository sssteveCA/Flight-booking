<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Post;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class PostControllerApi extends Controller
{
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
                return response()->json([
                    C::KEY_DONE => true,
                    C::KEY_EMPTY => false,
                    C::KEY_STATUS => 'OK',
                    'n_posts' => $n_posts,
                    'posts' => $posts_array
                ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }//if($n_posts > 0){
            //No post in the database
            return response()->json([
                C::KEY_DONE => true,
                C::KEY_EMPTY => true,
                C::KEY_STATUS => 'EMPTY',
                'n_posts' => $n_posts,
                C::KEY_MESSAGE => C::MESS_NOPOSTS
            ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->json([
                    C::KEY_DONE => false,
                    C::KEY_EMPTY => false,
                    C::KEY_STATUS => 'ERROR',
                    C::KEY_MESSAGE => C::ERR_NEWS,
                ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
            );
        }
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post,$permalink)
    {
        try{
            $post = Post::find($permalink);
            if($post != null){
                return response()->json([
                    C::KEY_DONE => true,
                    C::KEY_STATUS => 'OK',
                    'post' => $post
                ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }
            return response()->json(
                [
                    C::KEY_DONE => false,
                    C::KEY_STATUS => 'ERROR',
                    C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
                ],404,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->json([
                    C::KEY_DONE => false,
                    C::KEY_STATUS => 'ERROR',
                    C::KEY_MESSAGE => C::ERR_NEWS_SINGLE
                ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
            );
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
