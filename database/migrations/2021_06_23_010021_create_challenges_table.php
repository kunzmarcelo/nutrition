<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->nullable(); //data de inicio
            $table->unsignedInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
            $table->string('total_production')->nullable(); //produção total dia
            $table->string('coefficient')->nullable(); //coeficiente
            $table->string('result')->nullable(); //resultado
            $table->string('production_projection')->nullable(); //projeção de producao
            $table->date('analysis_time')->nullable(); //tempo de analise
            $table->bigInteger('user_id')->unsigned()->index(); // this is working
            $table->foreign('user_id')
                              ->references('id')
                              ->on('users')
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
        Schema::dropIfExists('challenges');
    }
}
