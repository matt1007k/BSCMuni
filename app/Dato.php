<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    protected $fillable = [
        'anio',
        'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio',
        'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre',
        'total', 'porcentaje', 'anterior',
    ];

    public function indicador()
    {
        return $this->belongsTo(Indicador::class);
    }
}