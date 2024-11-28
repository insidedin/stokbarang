@extends('layouts.main')

@section('name', 'Daftar Produk')

@section('content')
<div class="container mt-5">
    <h2>Daftar Produk</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Gambar</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produks as $key => $produk)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $produk->nama_barang }}</td>
                    <td>
                        @if ($produk->gambar)
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar {{ $produk->nama_barang }}" class="img-thumbnail" style="max-width: 100px;">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $produk->stok }}</td>
                    <td>{{ $produk->deskripsi }}</td>
                    <td>
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada produk yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
