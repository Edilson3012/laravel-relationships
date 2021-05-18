<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // $fillable -> array que indica quais campos podem ser preenchidos
    protected $fillable = ['name'];

    //método para pegar uma localização 1:1
    public function location(){
        return $this->hasOne(Location::class);
    }

    // pegar estados de um país
    public function states(){
        return $this->hasMany(State::class);
    }

    public function cities(){
        return $this->hasManyThrough(City::class, State::class);
    }

}
