<?php

namespace App\Http\Controllers\api;

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
                    'rel'=>'api.articles',
                    'href'=>route('api.posts.index'),
                ]
            ]
        ],200, [], JSON_PRETTY_PRINT);
    }
}
