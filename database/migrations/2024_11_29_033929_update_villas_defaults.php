<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('villas', function (Blueprint $table) {
            $table->string('nama')->default('Nama Villa')->change();
            $table->decimal('harga', 12, 2)->default(0.00)->change();
            $table->string('lokasi')->default('Lokasi Tidak Ada')->change();
            $table->decimal('rating', 3, 2)->default(0.00)->change();
            $table->text('deskripsi')->default('Deskripsi Tidak Tersedia')->change();
            $table->string('gambar')->default('default.jpg')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('villas', function (Blueprint $table) {
            $table->string('nama')->default(null)->change();
            $table->decimal('harga', 12, 2)->default(null)->change();
            $table->string('lokasi')->default(null)->change();
            $table->decimal('rating', 3, 2)->default(null)->change();
            $table->text('deskripsi')->default(null)->change();
            $table->string('gambar')->default(null)->change();
        });
    }
};
