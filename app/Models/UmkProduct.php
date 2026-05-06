<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmkProduct extends Model
{
    protected $fillable = ['nama_produk', 'harga', 'deskripsi', 'foto_produk'];
}
