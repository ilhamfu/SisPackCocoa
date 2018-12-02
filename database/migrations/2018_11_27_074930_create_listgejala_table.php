<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListgejalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listgejala', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gejala_id')->unsigned();
            $table->integer('penyakit_id')->unsigned();
            $table->foreign('penyakit_id')->references('id')->on('penyakits')->onDelete('cascade');
            $table->foreign('gejala_id')->references('id')->on('gejalas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listgejala');
    }
}
