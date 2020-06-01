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
    public function show(Post $post)
    {
        return (new PostTransformer) -> withItem($post);
    }

    public function store(PostsRequest $request)
    {
        $post = new Post;
        $content = new Content;
        $post -> fill($request->all());
        $content->body = $request->body;
        DB::beginTransaction();
        $post ->save();
        $content->post_id = $post->id;
        $content->save();
        DB::commit();
        return response()->json([
            'code'=>200,
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
