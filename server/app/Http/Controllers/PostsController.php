<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use App\Services\Interfaces\PostService;
use App\Transformers\PostTransformer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class PostsController extends Controller
{
    protected $service;
    protected $transform;
    public function __construct(PostService $service, PostTransformer $transform)
    {
        $this->service = $service;
        $this->transform = $transform;
    }
    //return type
    public function show(int $post_id) : JsonResponse
    {
        $post = $this->service->getPost($post_id);
        // return $post->id;
        return $this->transform->withItem($post);
    }

    public function store(PostsRequest $request) : JsonResponse
    {
        $post = $this->service->storePost($request->all());
        return $this->transform->withItem($post);
    }

    public function update(int $post_id, PostsRequest $request) : JsonResponse
    {
        //Eloquent
        $post = $this->service->updatePost($post_id, $request->all());
        return $post;
    }

    public function destroy(int $post_id) : JsonResponse
    {
        //Eloquent
        $post = $this->service->deletePost($post_id);
        return $post;
    }
}
