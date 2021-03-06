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

    public function oneToOneInverse()
    {
        $latitude = 123;
        $longitude = 321;

        $location = Location::where('latitude', $latitude)
                                ->where('longitude', $longitude)->get()->first();

        // exibir o id
        // echo $location->id;

        $country = $location->country;
        echo $country->name;
    }

    public function oneToOneInsert(){
        // Simulando dados vindos do formulário
        $dataForm = [
            'name' => 'Egitosssd',
            'latitude' => 789,
            'longitude' => 987
        ];

        $country = Country::create($dataForm);

        // $dataForm = [
        //     'latitude' => $dataForm['latitude'],
        //     'longitude' => $dataForm['longitude'],
        //     'country_id' => $country->id
        // ];
        // $location = Location::create($dataForm);

        $location = $country->location()->create($dataForm);
        var_dump($location);

    }

}
