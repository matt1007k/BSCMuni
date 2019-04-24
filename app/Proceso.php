<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $fillable = ['titulo'];

    public function subprocesos(){
        return $this->hasMany('App\Subproceso');
    }
}
