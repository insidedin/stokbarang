@extends('layouts.main')

@section('name', 'Data Produk')

@section('content')
<div class="container mt-5">
    <h2>Daftar Product</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
    </nav>
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">Data Product</div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('produk.create') }}" class="btn btn-primary" role="button">Tambah Product</a>
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
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data produk belum tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection