<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPermintaansTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_permintaans', function (Blueprint $table) {
            $table->id();
            // TAMBAHKAN ID NOTA NANTI
            // HISTORY SPD & PERMINTAAN DIGABUNG JADI 1
            // HISTORY NOTA SENDIRI
            $table->foreignId('user_id')
                ->references('id')
                ->on('users');
            $table->foreignId('laporan_spd_id');
            $table->string('nama');
            $table->string('nip');
            $table->string('golongan');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('lama');
            $table->string('malam');
            $table->integer('biaya_taksi');
            $table->integer('biaya_transportasi_darat');
            $table->integer('tiket_pesawat');
            $table->integer('biaya_penginapan');
            $table->integer('uang_harian');
            $table->integer('uang_representasi');
            $table->integer('jumlah_biaya_penginapan');
            $table->integer('jumlah_uang_harian');
            $table->integer('jumlah_uang_representasi');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_permintaans');
    }
}
