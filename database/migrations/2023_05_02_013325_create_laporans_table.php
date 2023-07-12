<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_spd')->nullable();
            $table->string('maksud');
            $table->string('status_spd');
            $table->string('jenis_perjalanan');
            $table->string('jenis_transportasi');
            $table->foreignId('provinsi');
            $table->foreignId('kota');
            $table->date('tanggal_mulai');
            $table->date('tanggal_pulang');
            $table->integer('lama');
            $table->integer('malam');
            $table->date('verifikasi_pada')->nullable();
            $table->string('verifikasi_oleh')->nullable();
            $table->date('verifikasi_pelaksanaan_pada')->nullable();
            $table->string('verifikasi_pelaksanaan_oleh')->nullable();
            $table->date('verifikasi_bendahara_pada')->nullable();
            $table->foreignId('verifikasi_bendahara_oleh')->nullable();
            $table->foreignId('ditolak_oleh')->nullable();
            $table->string('input_by');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
