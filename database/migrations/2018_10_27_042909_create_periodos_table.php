<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeriodosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('escola_id')->unsigned();
            $table->integer('ano');
            $table->boolean('anual');
            $table->boolean('semestre1');
            $table->boolean('semestre2');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('escola_id')->references('id')->on('escolas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('periodos');
    }
}
