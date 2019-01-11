<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['description'];
	
    public function commentable()
    {
    	return $this->morphTo();
    }

    public function comments()
    {
    	/*retorna o método commentable da classe Comment*/
    	return $this->morphMany(Comment::class,'commentable');
    }
}
