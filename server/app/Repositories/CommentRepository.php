<?php

namespace App\Repositories;

use App\EloquentModel\Comment;

class CommentRepository
{
    protected $category;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function saveComment($post, $request)
    {
        $post->comments()->$this->comment->fill($request);
        $this->comment->save();
        return $this->comment;
    }
}
