<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    protected $fillable = [
        'visi', 'misi', 'foto_sotk', 'link_peta', 'luas_desa',
        'kepala_nama', 'kepala_jabatan', 'kepala_periode', 'kepala_foto', 'kepala_deskripsi'
    ];
}
