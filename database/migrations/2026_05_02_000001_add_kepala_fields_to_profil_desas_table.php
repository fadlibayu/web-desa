<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_desas', function (Blueprint $table) {
            $table->string('kepala_nama')->nullable();
            $table->string('kepala_jabatan')->nullable();
            $table->string('kepala_periode')->nullable();
            $table->string('kepala_foto')->nullable();
            $table->text('kepala_deskripsi')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('profil_desas', function (Blueprint $table) {
            $table->dropColumn(['kepala_nama', 'kepala_jabatan', 'kepala_periode', 'kepala_foto', 'kepala_deskripsi']);
        });
    }
};
