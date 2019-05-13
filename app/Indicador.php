<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table = 'indicadores';

    protected $fillable = [
        'indicador', 'tipo', 'unidad', 'tiempo', 'meta', 'verde', 'amarillo', 'rojo',
    ];

    public function objetivo()
    {
        return $this->belongsTo(Objetivo::class);
    }

    public function datos()
    {
        return $this->hasMany(Dato::class);
    }
}