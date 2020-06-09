<?php
namespace App\Services\Interfaces;

use App\DTO\Content\ContentDTO;

interface PostService{
    public function getPost(ContentDTO $content);
    public function storePost(array $post_info);
    public function updatePost(int $post_id, array $post_info);
    public function deletePost(int $post_id);
}
