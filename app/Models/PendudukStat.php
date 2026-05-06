<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendudukStat extends Model
{
    protected $fillable = ['total_penduduk', 'laki_laki', 'perempuan', 'kepala_keluarga', 'mutasi'];
}
