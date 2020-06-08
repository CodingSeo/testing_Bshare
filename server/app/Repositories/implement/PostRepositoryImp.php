<?php

namespace App\Repositories\Implement;

use App\DTO\DTO;
use App\EloquentModel\Content;
use App\EloquentModel\Post;
use App\Repositories\interfaces\PostRepository;

class PostRepositoryImp implements PostRepository
{
    protected $post, $content, $dto;
    public function __construct(Post $post, Content $content, DTO $dto)
    {
        $this->post = $post;
        $this->content = $content;
        $this->dto = $dto;
    }
    public function getPostById($post_id)
    {
        $post = $this->post->find($post_id);
        return $this->dto->make($post);
    }
    public function savePost(array $post_info)
    {
        $this->post->fill($post_info);
        $this->post->save();
        return $this->dto->make($this->post);
    }
    public function getContent($post)
    {
        $content = $post->content()->first();
        return $this->dto->make($content);
    }
    public function getComments($post)
    {
        return $post->comments()->with('replies')->whereNull('parent_id')
            ->latest()->get();
    }
    public function saveContent($post_id, $body)
    {
        $this->content->post_id = $post_id;
        $this->content->text = $body;
        $this->content->save();
        return $this->dto->make($this->content);
    }
    public function inceaseViewCount($post)
    {
        $post->view_count++;
        $post->save();
    }
    public function updatePost($post, $post_info)
    {
        $post = $post->update($post_info);
        return $this->dto->make($post);
    }
    public function updateContent($post, $body)
    {
        $post->content()->update([
            'text' => $body
        ]);
        return $this->dto->make($this->getContent($post));
    }
    public function deletePost($post)
    {
        return $post->delete();
    }
}
