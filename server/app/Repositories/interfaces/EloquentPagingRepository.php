<?php

namespace App\Repositories\Interfaces;

interface EloquentPagingRepository
{
    public function paginate(object $content, int $paginate);
}
