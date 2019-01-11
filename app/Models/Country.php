<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;


class Country extends Model
{
	protected $fillable = ['name'];
	/*
	RELACIONAMENTO 2 PARA 1
	OneToOne retorna apenas um item
	*/
    public function location()
    {
    	return $this->hasOne(Location::class);
    }

    public function state()
    {
    	return $this->hasMany(State::class);
    }

    /*retorna as cidades do estado*/
    public function cities()
    {
        return $this->hasManyThrough(City::class,State::class);
    }

    public function comments()
    {
        /*retorna o método commentable da classe Comment*/
        return $this->morphMany(Comment::class,'commentable');
    }
}
