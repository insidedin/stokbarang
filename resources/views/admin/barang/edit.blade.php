@extends('layouts.main')

@section('name', 'Edit Barang')

@section('content')
<div class="container mt-5">
    <h2>Edit Barang Masuk</h2>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Barang</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            <small>Gambar saat ini: <img src="{{ asset('storage/' . $barang->gambar) }}" alt="{{ $barang->nama_barang }}" width="50"></small>
        </div>
        <div class="mb-3">
            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
            <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" value="{{ $barang->jumlah_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="{{ $barang->tanggal_masuk }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection