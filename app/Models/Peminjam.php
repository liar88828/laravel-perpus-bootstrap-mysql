<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'tgl_pinjam',
        'id_petugas',
        'id_anggota',
        'id_buku',
    ];
}
