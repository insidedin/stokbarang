<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'gambar' => 'required|image',
            'deskripsi' => 'required',
        ]);

        Produk::create([
            'nama_barang' => $request->nama_barang,
            'gambar' => $request->file('gambar')->store('gambar_produk', 'public'),
            'deskripsi' => $request->deskripsi,
            'stok' => 0,  // Stok awal adalah 0
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'gambar' => 'nullable|image',
            'deskripsi' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update([
            'nama_barang' => $request->nama_barang,
            'gambar' => $request->file('gambar') ? $request->file('gambar')->store('gambar_produk', 'public') : $produk->gambar,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}

