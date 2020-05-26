<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=['trade_info','book_info'];
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
