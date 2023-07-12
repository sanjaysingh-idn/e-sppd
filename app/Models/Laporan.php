<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function r_user()
    {
        return $this->belongsTo(User::class, 'ditolak_oleh', 'id');
    }

    public function r_provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi', 'id');
    }

    public function r_kota()
    {
        return $this->belongsTo(Kota::class, 'kota', 'city_id');
    }
}
