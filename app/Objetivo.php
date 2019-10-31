<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $fillable = ['slug', 'contenido', 'relacion'];

    public function perspectiva()
    {
        return $this->belongsTo('App\Perspectiva');
    }

    public function estrategias()
    {
        return $this->belongsToMany(Estrategia::class);
    }

    public function indicadores()
    {
        return $this->hasMany('App\Indicador');
    }

    public function getIdsEstrategias()
    {
        return $this->estrategias->map(function ($estrategia) {
            return (String) $estrategia->id;
        });
    }
}
