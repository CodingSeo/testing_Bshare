<?php

namespace App\Services\Interfaces;

interface PostService
{
    public function getPost($content);
    public function storePost($post_info);
    public function updatePost($post_id, $post_info);
    public function deletePost($post_id);
}
