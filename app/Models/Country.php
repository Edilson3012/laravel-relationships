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

}
