@extends('layouts.auth')

@section('content')
<div class="login-card card shadow-sm">
    <div class="row g-0">
        <!-- Bagian Kiri: Gambar -->
        <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
            <img src="{{ asset('assets/img/swag.jpeg') }}" alt="Login Image" class="img-fluid" style="max-height: 100%; width: 100%; object-fit: cover;">
        </div>

        <!-- Bagian Kanan: Form Login -->
        <div class="col-md-6">
            <div class="card-body">
                <h4 class="text-center mb-4">Admin Login</h4>
                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <!-- Link untuk Kembali ke Halaman Home -->
                <div class="text-center mt-3">
                    <a href="{{ route('home.home') }}" class="text-decoration-none">Kembali ke Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

