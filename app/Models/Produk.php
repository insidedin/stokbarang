<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'gambar', 'deskripsi', 'stok'];

    // Relasi ke barang
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    // Fungsi untuk mengakumulasi stok produk
    public function updateStok()
    {
        $this->stok = $this->barang()->sum('jumlah_barang');
        $this->save();
    }
}



