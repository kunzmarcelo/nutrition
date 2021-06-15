<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */




    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description',191)->nullable();//descrição
            $table->string('grace_days',5)->nullable();//dias de carência
            $table->string('unit_of_measurement',100)->nullable();//unidade de medida
            $table->string('mode_of_use')->nullable();//modo de uso
            $table->timestamps();
        });

        Schema::create('animal_medicine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('animal_id')->unsigned();
            $table->integer('medicine_id')->unsigned()->index();
            $table->date('application_date')->nullable(); //data de aplicação
            $table->date('next_application')->nullable(); //data de aplicação
            $table->timestamps();
            $table->foreign('animal_id')
                    ->references('id')
                    ->on('animals')
                    ->onDelete('cascade');
          $table->foreign('medicine_id')
                  ->references('id')
                  ->on('medicines')
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
        Schema::dropIfExists('animal_medicine');
        Schema::dropIfExists('medicines');
    }
}
