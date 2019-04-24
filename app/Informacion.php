<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    protected $table = 'informaciones';
    protected $fillable = ['nombre','mision','vision','macroproceso'];
}
