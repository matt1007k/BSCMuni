<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposicion extends Model
{
    protected $fillable = ['segmento', 'propuesta', 'elementos', 'estrategias'];

    protected $table = 'proposiciones';
}
