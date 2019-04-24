<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perspectiva extends Model
{
   protected $fillable = ['slug', 'titulo'];

   public function objetivos(){
     return $this->hasMany('App\Objetivo');
   }
}
