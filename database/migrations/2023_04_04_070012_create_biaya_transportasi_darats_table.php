<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaTransportasiDaratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_transportasi_darats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_provinsi')->nullable();
            $table->string('ibu_kota_provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->integer('besaran')->nullable();
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
        Schema::dropIfExists('biaya_transportasi_darats');
    }
}
