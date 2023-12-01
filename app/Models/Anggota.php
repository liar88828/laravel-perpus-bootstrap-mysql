<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'no_tlp',
        'denda',
        'id_user',
        'img'
    ];


    public function user_one()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function user_many()
    {
        return $this->hasMany(User::class, 'id', 'id_user');
    }

    public function anggota_user()
    {
        return $this->hasMany(User::class, 'id_user');
    }
}
