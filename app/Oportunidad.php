<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oportunidad extends Model
{
    protected $table = 'oportunidades';

    protected $fillable = ['slug', 'titulo'];

    public function factores()
    {
        return $this->hasMany('App\Factor');
    }
}
