<?php

namespace App\Repositories\Interfaces;

interface PostRepository
{
    public function getPostById($content);
    public function savePost($post_info);
    public function getContent($post);
    public function getComments($post);
    public function saveContent($post_id, $body);
    public function inceaseViewCount($post);
    public function updatePost($post, $post_info);
    public function updateContent($post, $body);
    public function deletePost($post);
}
