<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function cities()
    {
    	/*Se não user o company_city vai dar erro,
    	o laravel espera o nome das tabelas em ordem alfabetica (city_company), como definimos a tabela com o nome de company_city, etnão é obrigatório colocar*/
    	return $this->belongsToMany(City::class,'company_city');
    }

    public function comments()
    {
    	/*retorna o método commentable da classe Comment*/
    	return $this->morphMany(Comment::class,'commentable');
    }
}
