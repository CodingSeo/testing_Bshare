<?php

namespace App\Repositories\interfaces;

interface ContentRepository
{
    public function getContentByPostId($post_id);
}
