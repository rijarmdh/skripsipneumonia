<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gejalas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gejalas', function (Blueprint $table) {
            $table->increments('id_gejala')->unsigned();
            $table->integer('id_pasien')->unsigned();
            $table->float('suhu');
            $table->float('nadi');
            $table->float('pernafasan');
            $table->float('usia');
            $table->float('pao2');
            $table->float('sistolik');
            $table->float('ph');
            $table->float('bun');
            $table->float('natrium');
            $table->float('glukosa');
            $table->float('hematokrit');
            $table->string('efusi_pleura');
            $table->string('keganasan');
            $table->string('jantung');
            $table->string('serebrovaskular');
            $table->string('ginjal');
            $table->float('nilaiz');
            $table->string('gangguan _kesadaran');
            $table->string('pneumonia');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_pasien')->references('id_pasien')->on('pasiens')->onUpdate('cascade')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gejalas');
    }
}
