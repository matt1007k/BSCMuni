<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('titulo');
            $table->integer('alta')->default(0);
            $table->integer('media')->default(0);
            $table->integer('baja')->default(0);
            $table->integer('muy_bueno')->default(0);
            $table->integer('bueno')->default(0);
            $table->integer('deficiente')->default(0);
            $table->integer('muy_deficiente')->default(0);
            $table->integer('valor')->default(0);
            $table->unsignedBigInteger('area_id');

            $table->foreign('area_id')
                    ->references('id')->on('areas')
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
        Schema::dropIfExists('actividades');
    }
}
