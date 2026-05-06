<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demografi extends Model
{
    protected $fillable = ['kategori', 'label', 'jumlah', 'persentase'];
}
