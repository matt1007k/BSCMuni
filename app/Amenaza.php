<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenaza extends Model
{
    protected $fillable = ['slug', 'titulo'];

    public function factores()
    {
        return $this->hasMany('App\Factor');
    }
}
