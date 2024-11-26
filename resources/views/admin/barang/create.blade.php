@extends('layouts.main')

@section('name', 'Tambah Barang')

@section('content')
<div class="container mt-5">
    <h2>Tambah Barang Masuk</h2>

    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Barang</label>
            <input type="file" name="gambar" id="gambar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
            <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection