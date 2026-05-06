<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('demografis', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // e.g., 'usia', 'pekerjaan', 'agama', 'pendidikan'
            $table->string('label');    // e.g., '0-5 Tahun', 'PNS', 'Islam'
            $table->integer('jumlah');
            $table->decimal('persentase', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demografis');
    }
};
