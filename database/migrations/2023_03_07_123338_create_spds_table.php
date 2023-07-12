<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spds', function (Blueprint $table) {
            $table->id();
            $table->string('kode_spd')->nullable()->unique();
            $table->string('maksud');
            $table->string('nomor_surat_tugas')->nullable();
            $table->enum('status_spd', ['usulan', 'verifikasi', 'pelaksanaan', 'selesai', 'ditolak'])->default('usulan');
            $table->enum('jenis_perjalanan', ['luar kota', 'dalam kota', 'diklat']);
            $table->enum('jenis_transportasi', ['darat', 'udara']);
            $table->foreignId('provinsi');
            $table->foreignId('kota');
            $table->foreignId('mata_anggaran')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_pulang');
            $table->integer('lama');
            $table->integer('malam');
            $table->string('undangan')->nullable();
            $table->datetime('verifikasi_pada')->nullable();
            $table->foreignId('verifikasi_oleh')->nullable();
            $table->datetime('verifikasi_pelaksanaan_pada')->nullable();
            $table->foreignId('verifikasi_pelaksanaan_oleh')->nullable();
            $table->datetime('verifikasi_bendahara_pada')->nullable();
            $table->foreignId('verifikasi_bendahara_oleh')->nullable();
            $table->foreignId('bendahara')->nullable();
            $table->string('input_by');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('spds');
    }
}
