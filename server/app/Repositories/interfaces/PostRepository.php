<?php

namespace App\Repositories\Interfaces;

interface PostRepository extends EloquentRepository, EloquentPagingRepository
{
    public function getContent($post);
    public function getComments($post);
}
