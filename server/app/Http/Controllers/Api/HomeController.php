<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return response()->json([
            'name'=>config('project.name').' API',
            'massage'=>'This is a base endpoint of Bshare API.',
            'links' =>[
                [
                    'rel' =>'self',
                    'href'=>route('api.index'),
                ],
                [
                    'rel'=>'api.category',
                    'href'=>route('api.category.posts.index',['category'=>1]),
                    'href_hc'=>"http://45.115.155.76/dev/api/category/1/posts",
                ]
            ]
        ],200, [], JSON_PRETTY_PRINT);
    }
}
