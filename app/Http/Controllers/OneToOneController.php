<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    //

    public function oneToOne()
    {
    	$country = Country::where('name','Angola')->get()->first();
    	
    	echo $country->name;

    	$location = $country->location;
    	echo "<hr>Latitude: {$location->latitude}<br>";
    	echo "Longitude: {$location->longitude}<br>";
    }

    public function oneToOneInv()
    {
    	$latitude = 123;
    	$longitude = 321;
    	$location = Location::where('latitude',$latitude)
    	->where('longitude',$longitude)
    	->get()->first();

    	$country = $location->country; /* $location->country aponta para o metodo country na classe Location*/

    	echo $country->name;
    }

    public function oneToOneInsert()
    {
    	$dataForm = [
    		'name' => 'França',
    		'latitude' => '112',
    		'longitude' => '122',
    	];

    	// Só pega o atributo 'name' pois é o que está
    	//definido no modelo Country;
    	$country = Country::create($dataForm);
/*
    	$location = new Location;
    	$location->latitude = $dataForm['latitude'];
    	$location->longitude = $dataForm['longitude'];
    	$location->country_id = $country->id;
    	$location->save();
*/
    	// Só pega os atributos 'latitude' e ''longitude
    	//pois é o que está definido no modelo Location;
    	$location = $country->location()->create($dataForm);
    }
}
