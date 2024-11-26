@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Edit Admin</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
        </ol>
    </nav>
    <hr>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $admin->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
