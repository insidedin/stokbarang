@extends('layouts.main')

@section('name', 'Data Barang')

@section('content')
<div class="container mt-5">
    <h2>Daftar Barang Masuk</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Barang Masuk</li>
        </ol>
    </nav>
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Data Barang Masuk</div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('barang.create') }}" class="btn btn-primary" role="button">Tambah Barang</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->produk->nama_barang }}</td> <!-- Mengambil nama barang dari relasi produk -->
                        <td>
                            <img src="{{ asset('storage/' . $item->produk->gambar) }}"
                                    alt="{{ $item->produk->nama_barang }}"
                                    width="50">
                        </td> <!-- Mengambil gambar dari relasi produk -->
                        <td>{{ $item->jumlah_barang }}</td>
                        <td>{{ $item->tanggal_masuk }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Data barang belum tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
