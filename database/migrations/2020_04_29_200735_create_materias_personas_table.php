<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_personas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_persona')->unsigned();
            $table->integer('id_materia')->unsigned();
            $table->foreign('id_materia')->references('id')->on('materias')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('id_persona')->references('id')->on('personas')
                    ->onUpdate('cascade')
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
        Schema::dropIfExists('materias_personas');
    }
}
