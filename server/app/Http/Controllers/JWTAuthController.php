<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JWT\JWTRegisterRequest;
use App\Http\Requests\JWT\JWTRequest;
use App\Services\UserService;
use App\Transformers\UserTransformer;

class JWTAuthController extends Controller
{
    protected $user_service;
    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }
    public function register(JWTRegisterRequest $request)
    {
        $user = $this->user_service->registerUser($request->all());
        return $user;
    }
    public function login(JWTRequest $request)
    {
        //policy
        if (!$token = auth('api')->attempt(
            ['email' => $request->email, 'password' => $request->password]
        )) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return (new UserTransformer)->respondWithToken($token);
    }

    public function user()
    {
        // return (new UserTransformer)->withUser();
        return response()->json(auth()->user());
    }

    public function refresh()
    {
        return (new UserTransformer)->respondWithToken(auth('api')->refresh());
    }

    public function logout()
    {
        auth()->logout();
        return (new UserTransformer)->logout();
    }
}
