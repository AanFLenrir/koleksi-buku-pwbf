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
        Schema::create('kategori', function (Blueprint $table) {
            // 🔹 Perbaikan: primary key + unsigned
            $table->integer('idkategori')->unsigned()->autoIncrement()->primary();
            
            $table->timestamps();
            $table->string('nama_kategori', 100)->unique();
            $table->string('kode_kategori', 5)->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};