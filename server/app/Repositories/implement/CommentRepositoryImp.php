<?php

namespace App\Repositories\Implement;

use App\DTO\CommentDTO;
use App\EloquentModel\Comment;
use App\Mapper\MapperService;
use App\Repositories\interfaces\CommentRepository;

class CommentRepositoryImp implements CommentRepository
{
    protected $comment, $mapper;
    public function __construct(Comment $comment, MapperService $mapper)
    {
        $this->comment = $comment;
        $this->mapper = $mapper;
    }
    public function getOne(int $id): object
    {
        $comment = $this->comment->find($id);
        return $this->mapper->map($comment, CommentDTO::class);
    }
    public function findAll(): array
    {
        $comments = $this->comment->all();
        return $this->mapper->mapArray($comments, CommentDTO::class);
    }
    public function updateByDTO(object $content): object
    {
        $this->comment->fill((array) $content);
        $this->comment->exists = true;
        $this->comment->update();
        return $this->mapper->map($this->comment, CommentDTO::class);
    }
    public function updateByContent(array $content): object
    {
        $this->comment->fill($content);
        $this->comment->exists = true;
        $this->comment->update();
        return $this->mapper->map($this->comment, CommentDTO::class);
    }
    public function delete(object $content): bool
    {
        $this->comment->fill((array) $content);
        $this->comment->exists = true;
        $result = $this->comment->delete();
        return $result;
    }
    public function save($content): object
    {
        $this->comment->fill($content);
        $this->comment->save();
        return $this->mapper->map($this->comment, CommentDTO::class);
    }
}
