<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('indicador', 200);
            $table->string('tipo', 50);
            $table->string('unidad', 50);
            $table->string('tiempo', 100);
            $table->integer('meta');
            $table->string('verde', 30);
            $table->string('amarillo', 30);
            $table->string('rojo', 30);

            $table->unsignedBigInteger('perspectiva_id');
            $table->foreign('perspectiva_id')->references('id')
                ->on('perspectivas')->onDelete('cascade');

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
        Schema::dropIfExists('indicadores');
    }
}