<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use Illuminate\Support\Facades\DB;
use App\Transformers\ArticleTransformer;

use App\Category;
use App\Post;
use App\Content;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        // return response()->json([
        //     'post' => $post,
        //     'content'=>$post->content()->get()
        // ], 200);
        return (new ArticleTransformer) -> withItem($post);
    }

    public function store(PostsRequest $request)
    {
        DB::beginTransaction();
        $content = new Content;
        $content->body = $request->body;
        $content->post_id = Post::create($request->all())->id;
        $content->save();
        DB::commit();
        
        return response()->json([
            'status' => 'success'
        ],200);
    }

    public function update(Post $post, PostsRequest $request)
    {
        DB::beginTransaction();
        $post ->update($request->all());
        $post ->content()->update([
            'body'=>$request->body
        ]);
        DB::commit();

        return response()->json([
            'status' => 'succes11s'
        ], 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'status' => 'success'
        ], 200);
    }
}
