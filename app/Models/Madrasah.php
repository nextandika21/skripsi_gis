<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madrasah extends Model
{
    protected $fillable = [
        'nama_madrasah',
        'jenis_madrasah',
        'alamat',
        'akreditasi',
        'npsn',
        'latitude',
        'longitude',
        'photo',
    ];
}
