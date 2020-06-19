<?php

namespace App\Auth\Implement;

use App\Auth\Interfaces\AuthUserRepository;
use Illuminate\Contracts\Auth\Authenticatable;

class GuestAuthUserRepository extends AuthUserRepository
{
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed  $identifier
     * @return array $user;
     */
    public  function retrieveById($identifier)
    {
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return array $user;
     */
    public  function retrieveByToken($identifier, $token)
    {
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public  function updateRememberToken(Authenticatable $user, $token)
    {
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return array $user;
     */
    public  function retrieveByCredentials(array $credentials)
    {
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public  function validateCredentials(Authenticatable $user, array $credentials)
    {
    }
}
