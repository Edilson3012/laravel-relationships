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
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->get();
        
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
}
