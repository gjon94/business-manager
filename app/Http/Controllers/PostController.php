<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->business_id = $request->business;
        $post->user_id = auth()->user()->id;

        $post->save();
        return redirect(route('business.homepage', $request->business));
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($business, $id)
    {

        $post = Post::findOrFail($id);

        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
