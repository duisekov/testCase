<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSheepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sheeps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('corral_id')->unsigned();

            $table->foreign('corral_id')->references('id')->on('corrals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sheeps');
    }
}
