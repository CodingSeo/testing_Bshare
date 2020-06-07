<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;

class CategoriesController extends Controller
{
    protected $category_service;
    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }
    public function index($category_id)
    {
        //Eloquent
        $posts = $this->category_service->getPostsWithCategory($category_id);
        return $posts;
    }
}
