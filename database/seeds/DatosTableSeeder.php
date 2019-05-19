<?php

use App\Dato;
use Illuminate\Database\Seeder;

class DatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dato::truncate();

        Dato::create([
            'anio' => '2018',
            'enero' => 5,
            'febrero' => 10,
            'marzo' => 20,
            'abril' => 25,
            'mayo' => 3,
            'junio' => 35,
            'julio' => 15,
            'agosto' => 8,
            'septiembre' => 4,
            'octubre' => 10,
            'noviembre' => 40,
            'diciembre' => 90,
            'total' => 100,
            'indicador_id' => 1,
        ]);

        Dato::create([
            'anio' => '2019',
            'enero' => 10,
            'febrero' => 10,
            'marzo' => 10,
            'abril' => 10,
            'mayo' => 10,
            'junio' => 10,
            'julio' => 10,
            'agosto' => 10,
            'septiembre' => 10,
            'octubre' => 10,
            'noviembre' => 10,
            'diciembre' => 10,
            'total' => 120,
            'indicador_id' => 1,
        ]);
    }
}