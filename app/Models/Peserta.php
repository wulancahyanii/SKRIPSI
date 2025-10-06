<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'asal_sekolah',
        'ttl',
        'kecamatan',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'foto'
    ];
}
