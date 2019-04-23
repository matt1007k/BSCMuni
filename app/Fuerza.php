<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuerza extends Model
{

    protected $fillable = ['titulo'];
    
    public function factores(){
        return $this->hasMany('App\Factor');
    }
}
