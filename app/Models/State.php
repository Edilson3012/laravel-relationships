<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    // Todos os campos que são inseridos manualmente.
    // Ex: Campos de dt de criação e dt update são feitos automaticamente, por isso não estão aqui 
    protected $fillable = ['name', 'initials', 'country_id'];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    
    public function cities(){
        return $this->hasMany(City::class);
    }

}
