<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\JWT\JWTRegisterRequest;
use App\Http\Requests\JWT\JWTRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Transformers\UserTransformer;
use App\User;

class JWTAuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login','register']]);
    // }
    public function register(JWTRegisterRequest $request) {
        $user = new User;
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->password_bcrypt = $request->password;
        $user->save();
        //sucess response with user
        return (new UserTransformer)->registerResponse($user);
    }
    public function login(JWTRequest $request) {
        //policy
        if (! $token = auth('api')->attempt(
            ['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return (new UserTransformer)->respondWithToken($token);
    }

    public function user() {
        // return (new UserTransformer)->withUser();
        return response()->json(auth()->user());
    }

    public function refresh() {
        return (new UserTransformer)->respondWithToken(auth('api')->refresh());
    }
    
    public function logout(){
        auth()->logout();
        return (new UserTransformer)->logout();
    }
}
