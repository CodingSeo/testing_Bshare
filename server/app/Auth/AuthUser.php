<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Tymon\JWTAuth\Contracts\JWTSubject as JWTSubjectContract;

class AuthUser implements AuthenticatableContract, JWTSubjectContract
{
    use Authenticatable, JWTSubject;
    /**
     * All of the user's attributes.
     *
     * @var array
     */
    protected $attributes, $primary_key, $id, $password, $rememberToken;

    /**
     * Create a new generic User object.
     *
     * @param  array  $attributes
     * @param string $id
     * @param string $password
     * @param string $rememberToken
     * @return void
     */
    public function __construct(array $attributes, $id, $password, $rememberToken)
    {
        $this->attributes = $attributes;
        $this->id = $id;
        $this->password = $password;
        $this->rememberToken = $rememberToken;
    }
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->id;
    }
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierPassword()
    {
        return $this->password;
    }
    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberToken;
    }

    /**
     * Dynamically access the user's attributes.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->attributes[$key];
    }

    /**
     * Dynamically set an attribute on the user.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * Dynamically check if a value is set on the user.
     *
     * @param  string  $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->attributes[$key]);
    }

    /**
     * Dynamically unset a value on the user.
     *
     * @param  string  $key
     * @return void
     */
    public function __unset($key)
    {
        unset($this->attributes[$key]);
    }


}
