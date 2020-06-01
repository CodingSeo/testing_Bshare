<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\JWT\JWTRegisterRequest;
use App\Http\Requests\JWT\JWTRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }
    public function login(JWTRequest $request) {
        if (! $token = auth('api')->attempt(
            ['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function user() {
        return response()->json(auth()->user());
    }

    public function refresh() {
        return $this->respondWithToken(auth('api')->refresh());
    }
    
    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function logout(){
        auth()->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'logout'
        ], 200);
    }
}
