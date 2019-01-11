<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;

class PolymorphicController extends Controller
{
    public function polymorphic(){
    	$city = City::where('name','Campinas')->get()->first();
    	echo "<b>{$city->name} </b><br>";
		
		$comments = $city->comments()->get();

		foreach ($comments as $comment) {
		    echo "{$comment->description}<hr>";
		}    	
    }
    
    public function polymorphicInsert(){
    	$city = City::where('name','Campinas')->get()->first();
		echo "<b>{$city->name} </b><br>";

    	$comment = $city->comments()->create([
    		'description' => "New Comment {$city->name} ".date('YmdHis'),
    	]);
    	//var_dump($comment);
    }
}
