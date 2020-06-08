<?php

namespace App\Repositories\interfaces;

interface CategoryRepository
{
    public function getCategoryByID($category_id);
    public function getPostsByCategory($category);
}
