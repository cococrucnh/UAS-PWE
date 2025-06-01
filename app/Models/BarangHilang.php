<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangHilang extends Model
{
    use HasFactory;

    protected $table = 'barang_hilang';

    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'lokasi_ditemukan',
        'tanggal_ditemukan',
        'status',
        'nama_pengambil',
        'tanggal_diambil',
    ];
}