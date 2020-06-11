<?php
namespace App\Services\Interfaces;

interface PostService{
    public function getPost($content);
    public function storePost(array $post_info);
    public function updatePost(int $post_id, array $post_info);
    public function deletePost(int $post_id);
}
