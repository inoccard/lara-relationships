<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\State;

use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
    	$countries = Country::where('name','LIKE',"%a%")->with('state')->get();

    	foreach ($countries as $country) {
    		echo "<b>".$country->name."</b>";
    	 	
    	 	$states = $country->state()->get(); //metodo state da classe Country

    	 	foreach ($states as $state) {
    	 	echo "<br>{$state->initials} - {$state->name}";
    	 }
    	 echo "<hr>";
    	}
    }

    public function oneToManyTwo()
    {
    	$countries = Country::where('name','LIKE',"%a%")->with('state')->get();

    	foreach ($countries as $country) {
    		echo "<b>".$country->name."</b>";
    	 	
    	 	$states = $country->state()->get(); //metodo state da classe Country

    	 	foreach ($states as $state) {
    	 		echo "<br>{$state->initials} - {$state->name}: ";
    	 		foreach ($state->cities()->get() as $city) {
    	 			echo " {$city->name}, ";
    	 		}
    	 }
    	 echo "<hr>";
    	}
    }

    public function ManyToOne()
    {
    	$stateName = "Santa Catarina";
    	$state = State::where('name',$stateName)->get()->first();
    		echo "<b>{$state->name}</b>";

    		$country = $state->country()->get()->first();
    		echo "<br>País: {$country->name}";
    }

    public function oneToManyInsert()
    {
    	$dataForm = [
    		'name'=>'Ceará',
    		'initials'=>'CE',
    		'country_id'=>'1'];

    	if($insertState = State::create($dataForm))
    		echo "Cadastrado com sucesso";
    	else
    		echo "Não foi possivel Cadastrar";
    }

    public function hasManyThrough()
    {
    	$country = Country::find(2);
    	echo "<b>{$country->name}:</b> <hr>";
    	
    	/*recupera as cidades do país*/
    	$cities = $country->cities()->get();

    	foreach ($cities as $city) {
    		echo "{$city->name}, ";
    	}
    	echo "<br>Total de cidades: {$cities->count()}";
    }

}
