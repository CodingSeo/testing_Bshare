<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    
    public function index(Category $category)
    {
        return response()->json([
            $category->posts()->latest()->paginate(5),
        ]);
    }
    // public function index($category_id)
    // {
    //     return response()->json([
    //         Category::find($category_id)->posts()->latest()->paginate(5),
    //     ]);
    // }
}
