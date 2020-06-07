<?php

namespace App\EloquentModel;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['text'];
    protected $hidden = ['id'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
