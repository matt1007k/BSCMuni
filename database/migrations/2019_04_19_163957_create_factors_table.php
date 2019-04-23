<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('titulo');
            $table->integer('alta')->default(0);
            $table->integer('media')->default(0);
            $table->integer('baja')->default(0);
            $table->integer('muy_positivo')->default(0);
            $table->integer('positivo')->default(0);
            $table->integer('negativo')->default(0);
            $table->integer('muy_negativo')->default(0);
            $table->integer('valor')->default(0);
            $table->unsignedBigInteger('fuerza_id');

            $table->foreign('fuerza_id')
                    ->references('id')->on('fuerzas')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('factores');
    }
}
