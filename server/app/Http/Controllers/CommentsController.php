<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use App\Services\PostService;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $comment_service;
    public function __construct(CommentService $comment_service)
    {
        $this->comment_service = $comment_service;
    }
    public function store($post_id, Request $request)
    {
        $comment = $this->comment_service->storeComment($post_id, $request->all());
        return $comment;
    }

    public function update(Request $request, $comment_id)
    {
    }

    public function destroy($id)
    {
    }
}
