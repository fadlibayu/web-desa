<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penduduk_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('total_penduduk');
            $table->integer('laki_laki');
            $table->integer('perempuan');
            $table->integer('kepala_keluarga');
            $table->integer('mutasi')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penduduk_stats');
    }
};
