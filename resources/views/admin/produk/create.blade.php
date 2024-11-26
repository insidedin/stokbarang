@extends('layouts.main')

@section('name', 'Tambah Produk')

@section('content')
<div class="container mt-5">
    <h2>Tambah Produk</h2>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="barang_id" class="form-label">Pilih Barang</label>
            <select name="barang_id" id="barang_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach ($barangs as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection