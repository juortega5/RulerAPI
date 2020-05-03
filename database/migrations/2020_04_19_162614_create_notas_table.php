<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('id_persona')->unsigned();
            $table->integer('id_trabajo')->unsigned();
            $table->integer('nota')->unsigned();
            $table->string('archivoE');
            $table->string('comentario');
            $table->timestamps();
             $table->foreign('id_persona')->references('id')->on('personas')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('id_trabajo')->references('id')->on('trabajos')
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
        Schema::dropIfExists('notas');
    }
}
