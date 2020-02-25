<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
   protected $fillable = ['titulo'];

   public function actividades(){
       return $this->hasMany('App\Actividad');
   }
   
}
