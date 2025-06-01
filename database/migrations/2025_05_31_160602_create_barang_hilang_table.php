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
        Schema::create('barang_hilang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->text('deskripsi')->nullable();
            $table->string('lokasi_ditemukan');
            $table->date('tanggal_ditemukan')->nullable();
            $table->enum('status', ['hilang', 'ditemukan', 'diambil'])->default('hilang');
            $table->string('nama_pengambil')->nullable();
            $table->date('tanggal_diambil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_hilang');
    }
};
