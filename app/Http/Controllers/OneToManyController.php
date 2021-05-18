<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function oneToMany(){
         
        // $country = Country::where('name', 'Brasil')->get()->first();

        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();
        
        foreach($countries as $country){
            
            echo "<b>$country->name</b>";
            
            // $states = $country->states; //chamando como atributo
            
            //chamando como método
            $states = $country->states()->get(); 
            // Uma das diferenças de invocar o método, é a possibilidade de colocar uma condição (where)
            // $states = $country->states()->where('initials', 'GO')->get();
            
            foreach($states as $state){
                echo "<hr>{$state->initials}-{$state->name}";
            }
            echo "<hr>";
        }

    }

    public function manyToOne(){

        $stateName = 'São Paulo';
        $state = State::where('name', $stateName)->get()->first();
        echo "<b>{$state->name}</b>";

        $country = $state->country;
        echo "<br>País: {$country->name}";
    }

    public function oneToManyTwo(){
         
        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();
        
        foreach($countries as $country){
            
            echo "<b>$country->name</b>";
            
            $states = $country->states; 
            
            foreach($states as $state){
                echo "<hr>{$state->initials}-{$state->name}: ";

                foreach($state->cities as $city){
                    echo "{$city->name}, ";
                }

            }
            echo "<hr>";
        }

    }

    public function oneToManyInsert(){
        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA'
        ];

        $country = Country::find(1);

        $country->states()->create($dataForm);
    }

    public function oneToManyInsertTwo(){
        $dataForm = [
            'name' => 'Amazonas',
            'initials' => 'AM',
            'country_id' => 1
        ];

        State::create($dataForm);
    }

    public function oneToManyThrough(){

        $country = Country::find(1);
        echo "<b>$country->name</b><br>";

        $cities = $country->cities;

        foreach($cities as $city){
            echo "{$city->name}, ";
        }

        echo "<br>Total Cidades: {$city->count()}";

    }

}
