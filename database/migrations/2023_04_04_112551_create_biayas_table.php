<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayasTable extends Migration
{
    public function up()
    {
        Schema::create('biayas', function (Blueprint $table) {
            $table->id();
            $table->integer('prov_id');
            $table->string('nama_provinsi')->nullable();
            $table->integer('luar_kota')->nullable();
            $table->integer('dalam_kota')->nullable();
            $table->integer('diklat')->nullable();
            $table->integer('eselon_1')->nullable();
            $table->integer('eselon_2')->nullable();
            $table->integer('eselon_3_golongan_4')->nullable();
            $table->integer('eselon_4_golongan_3')->nullable();
            $table->integer('biaya_taksi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biayas');
    }
}
