<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subproceso extends Model
{
    protected $fillable = ['titulo'];


    public function proceso(){
        return $this->belongsTo('App\Proceso');
    }
}
