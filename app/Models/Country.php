<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //método para pegar uma localização 1:1
    public function location(){
        return $this->hasOne(Location::class);
    }

}
