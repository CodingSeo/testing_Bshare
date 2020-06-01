<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use Illuminate\Support\Facades\DB;
use App\Transformers\PostTransformer;

use App\Category;
use App\Post;
use App\Content;

class PostsController extends Controller
{

    public function show($post_id){
        //Elogent + Array
        $post = Post::find($post_id);

        return (new PostTransformer)->withItem($post);
    }

    public function store(PostsRequest $request)
    {
        //Eloquent
        $post = new Post;
        $content = new Content;
        $post->fill($request->all());
        $content->body = $request->body;
        DB::beginTransaction();
        $post->save();
        $content->post_id = $post->id;
        $content->save();
        DB::commit();

        return (new PostTransformer)->withItem($post);
    }

    public function update($post_id, PostsRequest $request)
    {
        //Eloquent
        $post = Post::find($post_id);
        DB::beginTransaction();
        $post->update($request->all());
        $post->content()->update([
            'body' => $request->body
        ]);
        DB::commit();

        return (new PostTransformer)->withItem($post);
    }

    public function destroy($post_id)
    {
        //Eloquent
        $post = Post::find($post_id)->delete();

        return (new PostTransformer)->withItem($post);
    }
}
