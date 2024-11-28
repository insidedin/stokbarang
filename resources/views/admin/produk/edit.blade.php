@extends('layouts.main')

@section('name', 'Edit Produk')

@section('content')
<div class="container mt-5">
    <h2>Edit Produk</h2>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Produk</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $produk->nama_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Barang</label>
            <input type="file" name="gambar" id="gambar" class="form-control" value="{{ $produk->gambar }}">
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ $produk->stok }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" required>{{ $produk->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
