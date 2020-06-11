<?php

namespace App\Repositories\Implement;

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
    public function getPostById($content)
    {
        $post = $this->post->find(8);
        return $post;
    }
    public function savePost($post_info)
    {
        $this->post->fill($post_info);
        $this->post->save();
        return $this->post;
    }
    public function getContent($post)
    {
        $content = $post->content()->first();
        return $content;
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
        return $this->content;
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
