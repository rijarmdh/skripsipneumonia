<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Himpunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('himpunans', function (Blueprint $table) {
            $table->increments('id_himpunan')->unsigned();
            $table->integer('id_gejala')->unsigned();
            $table->string('namahimpunan');
            $table->float('batasbawah');
            $table->float('batastengaha')->nullable();
            $table->float('batastengahb')->nullable();
            $table->float('batasatas');
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('id_gejala')->references('id_gejala')->on('gejalas')->onUpdate('cascade')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('himpunans');
    }
}
