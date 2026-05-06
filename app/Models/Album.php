<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'nama_kegiatan',
        'slug',
        'tanggal_acara',
        'cover_foto',
        'kumpulan_foto',
    ];

    protected $casts = [
        'kumpulan_foto' => 'array',
        'tanggal_acara' => 'date',
    ];
}
