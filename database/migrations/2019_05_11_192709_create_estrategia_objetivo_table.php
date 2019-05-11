<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstrategiaObjetivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estrategia_objetivo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('estrategia_id');
            $table->unsignedBigInteger('objetivo_id');

            $table->foreign('estrategia_id')->references('id')
                ->on('estrategias')->onDelete('cascade');
            $table->foreign('objetivo_id')->references('id')
                ->on('objetivos')->onDelete('cascade');
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
        Schema::dropIfExists('estrategia_objetivo');
    }
}