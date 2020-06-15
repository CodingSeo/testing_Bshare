<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\Http\Requests\CommentsStoreRequest;
use App\Http\Requests\CommentsUpdateRequest;
use App\Services\Interfaces\CommentService;

class CommentsController extends Controller
{
    protected $comment_service;
    public function __construct(CommentService $comment_service)
    {
        $this->comment_service = $comment_service;
    }
    public function store(CommentsStoreRequest $request)
    {
        dd($request->only([
            'body','parent_id','post_id'
        ]));
        $comment = $this->comment_service->storeComment($request->all());
        return $comment;
    }

    public function update(CommentsUpdateRequest $request)
    {
        $content = $request->all();
        $comment = $this->comment_service->updateComment($content);
        return $comment;
    }

    public function destroy($comment_id)
    {
        $comment = $this->comment_service->deleteComment($comment_id);
        return $comment;
    }
}
