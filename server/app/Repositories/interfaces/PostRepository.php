<?php

namespace App\Repositories\Interfaces;

use App\DTO\ContentDTO;
use App\DTO\PostCommentsDTO;
use App\DTO\PostDTO;

interface PostRepository
{
    public function getContent(PostDTO $post): ContentDTO;
    public function getComments(PostDTO $post): array;
    public function saveContent(int $post_id, array $content) : ContentDTO;
    public function updateContent(PostDTO $post, array $content) : ContentDTO;
}
