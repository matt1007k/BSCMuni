<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    protected $table = "factores";

    protected $fillable = [
        'titulo','alta','media','baja','muy_positivo','positivo','negativo','muy_negativo','valor'
    ];

    public function fuerza(){
        return $this->belongsTo('App\Fuerza');
    }

    public function amenaza()
    {
        return $this->belongsTo('App\Amenaza');
    }
    public function oportunidad()
    {
        return $this->belongsTo('App\Oportunidad');
    }
}
