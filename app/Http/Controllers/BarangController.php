<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', compact('barangs'));
    }

    public function create()
    {
        $produks = Produk::all();  // Ambil semua produk
        return view('admin.barang.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'gambar' => 'required|image',
            'jumlah_barang' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'produk_id' => 'required|exists:produks,id',
        ]);

        // Simpan data barang masuk
        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'gambar' => $request->file('gambar')->store('gambar_barang', 'public'),
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'produk_id' => $request->produk_id,
        ]);

        // Update stok produk terkait
        $produk = Produk::find($request->produk_id);
        $produk->updateStok();

        return redirect()->route('barang.index')->with('success', 'Barang masuk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $produks = Produk::all();
        return view('admin.barang.edit', compact('barang', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'gambar' => 'nullable|image',
            'jumlah_barang' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'produk_id' => 'required|exists:produks,id',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'gambar' => $request->file('gambar') ? $request->file('gambar')->store('gambar_barang', 'public') : $barang->gambar,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'produk_id' => $request->produk_id,
        ]);

        // Update stok produk terkait
        $produk = Produk::find($request->produk_id);
        $produk->updateStok();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $produk = Produk::find($barang->produk_id);
        $barang->delete();

        // Update stok produk terkait
        $produk->updateStok();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}

