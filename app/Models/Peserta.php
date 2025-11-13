<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';

    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'ttl',
        'jenis_kelamin',
        'kecamatan',
        'agama',
        'alamat',
        'no_hp',
        'tinggi_badan',
        'berat_badan',
        'pendidikan',
        'instansi',
        'hobi',
        'keterampilan',
        'organisasi',
        'foto',
        'identitas',
        'alasan',
        'harapan',
    ];
}
