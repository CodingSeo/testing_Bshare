<?php

namespace App\Services\Implement;

use App\DTO\CommentDTO;
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

    public function storeComment(array $content): CommentDTO
    {
        $post = $this->post_repository->getOne($content['post_id']);
        if (!$post->id) throw new \App\Exceptions\ModuleNotFound('Post not Found');
        //parent_id checking
        if (array_key_exists('parent_id', $content)) {
            $parent_comment = $this->comment_repository->getOne($content['parent_id']);
            if (!$parent_comment->id) throw new \App\Exceptions\ModuleNotFound('parent_comment not Found');
        }
        $comment = $this->comment_repository->save($content);
        return $comment;
    }

    public function updateComment(array $content): CommentDTO
    {
        $comment = $this->comment_repository->getOne($content['comment_id']);
        if (!$comment->id) throw new \App\Exceptions\ModuleNotFound('comment not Found');
        $comment = $this->comment_repository->updateByContent($content);
        return $comment;
    }

    public function deleteComment(array $content): bool
    {
        $comment = $this->comment_repository->getOne($content['comment_id']);
        if (!$comment->id) throw new \App\Exceptions\ModuleNotFound('comment not Found');
        $result = $this->comment_repository->delete($comment);
        if (!$result) throw new \App\Exceptions\ModuleNotFound('delete failed');
        return true;
    }
}
