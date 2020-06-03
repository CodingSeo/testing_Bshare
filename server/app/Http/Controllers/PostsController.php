<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    private $request, $service, $transform;
    public function __construct(APIRequest $request
    // , Service $service, Transformer $transform)
    )
    {
        $this->request = $request;
        // $this->service = $service;
        // $this->transform = $transform;
    }
    public function show($post_id)
    {

        // $post = $this->service->getPost($post_id);
        // return $this->transform->transform($post);

    }

    // public function store(Request $request)
    // {
    //     return $request;
    //     //Eloquent
    //     // $post = new Post;
    //     // $content = new Content;
    //     // $post->fill($request->all());
    //     // $content->body = $request->body;
    //     // DB::beginTransaction();
    //     // $post->save();
    //     // $content->post_id = $post->id;
    //     // $content->save();
    //     // DB::commit();

    //     // return (new PostTransformer)->withItem($post);
    // }

    // public function update($post_id, Request $request)
    // {
    //     //Eloquent
    //     $post = Post::find($post_id);
    //     DB::beginTransaction();
    //     $post->update($request->all());
    //     $post->content()->update([
    //         'body' => $request->body
    //     ]);
    //     DB::commit();

    //     return (new PostTransformer)->withItem($post);
    // }

    // public function destroy($post_id)
    // {
    //     //Eloquent
    //     $post = Post::find($post_id)->delete();

    //     return (new PostTransformer)->withItem($post);
    // }
}
