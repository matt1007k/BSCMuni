<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $fillable = ['slug', 'contenido'];

    public function perspectiva(){
        return $this->belongsTo('App\Perspectiva');
    }
}
