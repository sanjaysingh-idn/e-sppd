<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaTransportasiDarat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function r_provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'nama_provinsi', 'id');
    }
}
