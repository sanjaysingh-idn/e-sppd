<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jabatan_id');
            $table->foreignId('golongan_id');
            $table->foreignId('spd_id')
                ->nullable();
            $table->foreignId('permintaan_id')
                ->nullable();
            $table->string('name');
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'pegawai', 'penanggung jawab kegiatan', 'pejabat pembuat komitmen', 'bendahara pengeluaran'])->default('pegawai');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image')->nullable();
            $table->string('contact');
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
