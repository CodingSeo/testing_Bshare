<?php

namespace App\EloquentModel;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['body'];
    protected $hidden = ['id'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
