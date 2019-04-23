<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debilidad extends Model
{
    protected $table = 'debilidades';

    protected $fillable = ['slug', 'titulo'];

    public function actividades()
    {
        return $this->hasMany('App\Actividad');
    }
}
