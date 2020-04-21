<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_persona')->unsigned();
            $table->string('archivo');
            $table->string('descripcion');
            $table->integer('id_curso')->unsigned();
            $table->timestamps();
            $table->foreign('id_persona')->references('id')->on('personas')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('id_curso')->references('id')->on('prm_cursos')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
}
