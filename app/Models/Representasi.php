<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pangkat',
        'luar_kota',
        'dalam_kota',
    ];
}
