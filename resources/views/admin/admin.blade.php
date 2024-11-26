@extends('layouts.main')

@section('name', 'Data Admin')

@section('content')
    <div class="container mt-5">
        <h2>Data Admin</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
            </ol>
        </nav>
        <hr>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">Data Admin</div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.create') }}" class="btn btn-primary" role="button">Tambah Admin</a>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                            <tr>
                                <td>{{ $admin->nama }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data admin</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
