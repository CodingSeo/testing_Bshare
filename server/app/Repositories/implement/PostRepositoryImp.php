<?php

namespace App\Repositories\Implement;

use App\DTO\DTO;
use App\DTO\EloquentDTO;
use App\EloquentModel\Content;
use App\EloquentModel\Post;
use App\Repositories\interfaces\PostRepository;

class PostRepositoryImp implements PostRepository
{
    protected $post, $content;
    public function __construct(Post $post, Content $content)
    {
        $this->post = $post;
        $this->content = $content;
    }
    public function getPostById($post_id)
    {
        $post = $this->post->find($post_id);
        return EloquentDTO::map($post);
    }
    public function savePost(array $post_info)
    {
        $this->post->fill($post_info);
        $this->post->save();
        return DTO::map($this->post);
    }
    public function getContent($post)
    {
        $content = $post->content()->first();
        return DTO::map($this->post);
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
        return DTO::map($this->content);
    }
    public function inceaseViewCount($post)
    {
        $post->view_count++;
        $post->save();
    }
    public function updatePost($post, $post_info)
    {
        $post = $post->update($post_info);
        $this->dto->map($post);
        return $this->dto;
    }
    public function updateContent($post, $body)
    {
        $post->content()->update([
            'text' => $body
        ]);
        $this->dto->map($this->getContent($post));
        return $this->dto;
    }
    public function deletePost($post)
    {
        return $post->delete();
    }
}
