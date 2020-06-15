<?php

namespace App\Services\Implement;

use App\Repositories\Interfaces\CommentRepository;
use App\Repositories\Interfaces\PostRepository;
use App\Services\Interfaces\CommentService;

class CommentServiceImp implements CommentService
{
    protected $comment_repository, $post_repository;
    public function __construct(PostRepository $post_repository, CommentRepository $comment_repository)
    {
        $this->post_repository = $post_repository;
        $this->comment_repository = $comment_repository;
    }
    public function storeComment(array $request)
    {
        $post = $this->post_repository->getOne($request['post_id']);
        if (!$post->id) throw new \App\Exceptions\ModuleNotFound('Post not Found');
        $comment = $this->comment_repository->saveComment($post, $request);
        return collect($comment);
    }

    public function updateComment($comment_id,array $request){
        $comment = $this->comment_repository->getCommentById($comment_id);
        if (!$comment->id) throw new \App\Exceptions\ModuleNotFound('comment not Found');
        $this->comment_repository->updateComment($comment, $request);
        return collect($comment);
    }

    public function deleteComment($comment_id){
        $comment = $this->comment_repository->getCommentById($comment_id);
        if (!$comment->id) throw new \App\Exceptions\ModuleNotFound('comment not Found');
        $result = $this->comment_repository->deleteComment($comment);
        if(!$result) return 'failed delete comment';
        return collect($comment);
    }

}
