<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    protected $fillable = ['nama_barang', 'gambar', 'jumlah_barang', 'tanggal_masuk'];

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}

