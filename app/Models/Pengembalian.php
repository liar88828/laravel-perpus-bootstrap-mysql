<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_kembali',
        'denda',
        'keterangan',
        'id_buku',
        'id_petugas',
        'id_pinjam',
        'id_anggota',
    ];
}
