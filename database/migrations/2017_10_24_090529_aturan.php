<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Aturan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aturan', function (Blueprint $table) {
            $table->increments('id_aturan');
            $table->string('suhu');
            $table->string('nadi');
            $table->string('pernafasan');
            $table->string('usia');
            $table->string('pao2');
            $table->string('sistolik');
            $table->string('ph');
            $table->string('bun');
            $table->string('natrium');
            $table->string('glukosa');
            $table->string('hematokrit');
            $table->string('efusi_pleura');
            $table->string('keganasan');
            $table->string('jantung');
            $table->string('serebrovaskular');
            $table->string('ginjal');
            $table->string('gangguan _kesadaran');
            $table->string('pneumonia');
            $table->rememberToken();
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aturan');
    }
}
