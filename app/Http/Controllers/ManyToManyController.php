<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
    	$city = City::where('name','Campinas')->get()->first();
    	echo "<b>".$city->name."</b><br>";

    	$companies = $city->companies()->get();

    	foreach ($companies as $company) {
    		echo "{$company->name}, ";
    	}
    }

    public function ManyToManyInverse()
    {
    	$company = Company::where('name','Tec Genius')->get()->first();
    	echo "<b>".$company->name."</b><br>";

    	$cities = $company->cities()->get();

    	foreach ($cities as $city) {
    		echo "{$city->name}, ";
    	}
    }

    public function ManyToManyInsert(){
    	$dataForm = [1,2,3];

    	$company = Company::find(1);
    	echo "<b>{$company->name}:</b><br>";

    	$company->cities()->sync($dataForm);

    	$cities = $company->cities()->get();

    	foreach ($cities as $city) {
    		echo "{$city->name}, ";
    	}
    }
}
