<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $user_repository;
    public function __construct(UserRepository $user_repository)
    {
        $this->user_repository = $user_repository;
    }
    public function registerUser(array $user_info)
    {
        $user = $this->user_repository->registerUser($user_info);
        return $user;
    }
}
