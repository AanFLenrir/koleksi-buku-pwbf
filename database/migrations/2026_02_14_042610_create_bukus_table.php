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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('idbuku');
            $table->timestamps();
            $table->string('kode_buku', 20)->unique();
            $table->string('judul', 500);
            $table->string('pengarang', 200);

            // 🔹 Perbaikan: samakan tipe dengan kategori (INT UNSIGNED)
            $table->integer('idkategori')->unsigned()->nullable();

            // 🔹 Foreign key
            $table->foreign('idkategori')
                  ->references('idkategori')
                  ->on('kategori')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};