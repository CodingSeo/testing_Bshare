<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\PostsRequestIndex;
use App\Services\Interfaces\PostService;
use App\Transformers\PostTransformer;
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
    public function show(PostsRequestIndex $request): JsonResponse
    {
        $content = $request->only([
            'post_id'
        ]);
        $post = $this->service->getPost($content);
        dd($post);
        return $this->transform->withItem($post);
    }
    public function store(PostsRequest $request)
    {
        $content = $request->only([
            'title', 'body', 'category_id'
        ]);
        $post = $this->service->storePost($content);
        return $post;
        return $this->transform->withItem($post);
    }

    public function update(int $post_id, PostsRequest $request): JsonResponse
    {
        $content = $request->only([
            'post_id', 'title', 'body', 'category_id'
        ]);

        $post = $this->service->updatePost($content, $content);
        return $post;
    }

    public function destroy(PostsRequestIndex $request): JsonResponse
    {
        $content = $request->only([
            'post_id'
        ]);

        $post = $this->service->deletePost($content);
        return $post;
    }
}
