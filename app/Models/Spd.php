<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spd extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permintaans()
    {
        return $this->hasMany(Permintaan::class, 'spd_id');
    }

    public function pj()
    {
        return $this->belongsTo(User::class, 'verifikasi_oleh', 'id');
    }

    public function ppk()
    {
        return $this->belongsTo(User::class, 'verifikasi_pelaksanaan_oleh', 'id');
    }

    public function bd()
    {
        return $this->belongsTo(User::class, 'bendahara', 'id');
    }

    public function r_provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi', 'id');
    }

    public function r_kota()
    {
        return $this->belongsTo(Kota::class, 'kota', 'city_id');
    }

    public function mak()
    {
        return $this->belongsTo(MataAnggaran::class, 'mata_anggaran', 'id');
    }
}
