<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transformers\PostTransformer;
use App\Category;

class CategoriesController extends Controller
{

    public function index($category_id)
    {
        //Eloquent
        // $posts = Category::find($category_id)->posts()->latest()->paginate(5);

        // return (new PostTransformer)->withPagination($posts);
    }
}
