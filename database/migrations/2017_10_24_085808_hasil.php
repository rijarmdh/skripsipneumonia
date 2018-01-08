<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hasil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('hasils', function (Blueprint $table) {
            $table->increments('id_hasil');
            $table->integer('id_himpunan')->unsigned();
            $table->integer('id_solusi')->unsigned();
            $table->string('nama');
            $table->float('nilai');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_himpunan')->references('id_himpunan')->on('himpunans')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_solusi')->references('id')->on('solusis')->onUpdate('cascade')->onDelete('cascade');  
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
        Schema::drop('hasils');
    }
}
