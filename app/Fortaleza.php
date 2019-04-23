<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fortaleza extends Model
{
    protected $fillable = ['slug', 'titulo'];

    public function actividades()
    {
        return $this->hasMany('App\Actividad');
    }
}
