<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCursosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('periodo_id')->unsigned();
            $table->integer('coordenador_id')->unsigned();
            $table->text('descricao');
            $table->integer('cargahoraria');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->foreign('coordenador_id')->references('id')->on('coordenadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cursos');
    }
}
