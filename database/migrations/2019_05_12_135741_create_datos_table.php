<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('anio');
            $table->integer('enero')->default(0);
            $table->integer('febrero')->default(0);
            $table->integer('marzo')->default(0);
            $table->integer('abril')->default(0);
            $table->integer('mayo')->default(0);
            $table->integer('junio')->default(0);
            $table->integer('julio')->default(0);
            $table->integer('agosto')->default(0);
            $table->integer('septiembre')->default(0);
            $table->integer('octubre')->default(0);
            $table->integer('noviembre')->default(0);
            $table->integer('diciembre')->default(0);
            $table->integer('total')->default(0);
            $table->decimal('porcentaje', 7, 2)->default(0.00);
            $table->integer('anterior')->default(0);

            $table->unsignedBigInteger('indicador_id');
            $table->foreign('indicador_id')->references('id')
                ->on('indicadores')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos');
    }
}