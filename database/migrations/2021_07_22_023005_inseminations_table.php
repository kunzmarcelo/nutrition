<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InseminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inseminations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->date('date')->nullable();
            $table->string('insinuating')->nullable();
            $table->string('note')->nullable();
            $table->string('pre_delivery')->nullable();
            $table->bigInteger('semen_id')->unsigned()->index(); // this is working
          $table->foreign('semen_id')
                            ->references('id')
                            ->on('semens')
                            ->onDelete('cascade');
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
        Schema::dropIfExists('inseminations');
    }
}
