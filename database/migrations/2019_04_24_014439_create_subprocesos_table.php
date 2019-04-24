<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubprocesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subprocesos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->unsignedBigInteger('proceso_id');
            $table->foreign('proceso_id')->references('id')
                    ->on('procesos')->onDelete('cascade');
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
        Schema::dropIfExists('subprocesos');
    }
}
