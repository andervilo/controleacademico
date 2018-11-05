<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiretoresTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diretores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_funcional')->unsigned();
            $table->integer('pessoa_id')->unsigned();
            $table->double('salario');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diretores');
    }
}
