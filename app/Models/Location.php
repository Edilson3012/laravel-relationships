<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //retornar apenas um registro
    public function country()
    {
        // Quando os nomes dos campos de relacionamentos não seguir o padrão Laravel, fazer assim:
        // 1° parâmetro: Model que fará o relacionamento
        // 2° parâmetro: Campo que indica o relacionamento dessa model (Location)
        // 3° parâmetro: Campo que indica o relacionamento mãe
        // return $this->belongsTo(Country::class, 'country_id', 'id');
        
        // Quando os nomes dos campos de relacionamentos seguir o padrão Laravel, fazer assim:
        return $this->belongsTo(Country::class);
    }
}
