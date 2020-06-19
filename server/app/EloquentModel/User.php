<?php

namespace App\EloquentModel;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

    protected $fillable = [
        'id','name', 'email', 'password',
    ];

    protected $hidden = [
        'password_bcrypt'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            // 'name' => $this->name,
            // 'email' => $this->email
        ];
    }
}
