<?php
namespace App\Transformers;
use App\User;

class UserTransformer{
    
    public function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function logout(){
        return response()->json([
            'code'=>200,
            'status' => 'success',
            'message' => 'logout'
        ], 200);
    }
    public function registerResponse(User $user){
        return response()->json([
            'status' => 'success',
            'data' => $this->transform($user),
        ], 200);
    }
    public function transform(User $user){
        return [
            'name' => $user->name,
            'email' => $user->email,
            'created' => $user->created_at->toIso8601String(),
        ];
    }
}