<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne(){
        // $country = Country::find(1);    // buscando por id
        $country = Country::where('name', 'Brasil')->get()->first();    // buscando por condição
        echo $country->name;

        // Acessando como atrituto:
        // $location = $country->location;
        // echo "<hr>Latitude: {$location->latitude}";
        // echo "<hr>Longitude: {$location->longitude}";
        
        // Acessando como método
        $location = $country->location()->get()->first();
        echo "<hr>Latitude: {$location->latitude}";
        echo "<hr>Longitude: {$location->longitude}";

    }
}
