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
            $response_data = $this->setIndexResponseData();
            //Log::channel('stdout')->debug("PostController index response data => ".var_export($response_data['response'],true));
            return response()->view(P::VIEW_NEWS,$response_data['response']);
        }catch(Exception $e){
            //Log::channel('stdout')->debug("News Exception ".var_export($e->getMessage(),true));
            return response()->view(P::VIEW_NEWS,[
                C::KEY_DONE => false, C::KEY_EMPTY => false,
                C::KEY_STATUS => 'ERROR', C::KEY_MESSAGE => C::ERR_NEWS,
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
        $params = [
            'messages' => [ 'error' => C::ERR_URLNOTFOUND_NOTALLOWED ]
        ];
        try{
            $response_data = $this->setShowResponseData($permalink,$params);
            if($response_data['code'] == 200)
                return response()->view(P::VIEW_POST,$response_data['response']);
            session()->put('redirect','1');
            return redirect(P::URL_ERRORS);
        }catch(Exception $e){
            return response()->view(P::VIEW_POST,[
                C::KEY_DONE => false, C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => C::ERR_NEWS_SINGLE
            ],500);
        }
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
