@extends('layouts.app')

@section('title', 'Stock App')

@section('content')
    <section id="home" class="home-section" >
        <div class="home-background">
            <h2 data-aos="fade-up" data-aos-delay="100">Selamat Datang di <b>Aplikasi Stock Barang</b></h2>
            <p data-aos="fade-up" data-aos-delay="200">Aplikasi Stock & Layanan Produk Barang Elektronik Palcomtech</p>
            <div data-aos="fade-up" data-aos-delay="300">
                <a class="btn btn-primary" href="#about">Selengkapnya &raquo;</a>
            </div>
        </div>
    </section>

    <section id="about" class="about-section py-5">
        <br><br><br>
        <div class="container">
            <h3 data-aos="fade-right" data-aos-delay="100">Tentang Kami</h3>
            <p data-aos="fade-right" data-aos-delay="200">
                Kami adalah penyedia aplikasi manajemen stok digital yang dirancang khusus untuk bisnis Anda. Aplikasi kami membantu Anda mengelola inventaris toko elektronik dengan efisien, aman, dan mudah digunakan. Mulai dari pelacakan stok barang hingga analisis penjualan, semuanya terintegrasi dalam satu sistem.
            </p>
            <div class="row mt-4">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-box d-flex align-items-center mb-4">
                        <i class="bi bi-box-seam icon" style="font-size: 2rem; color: #007bff;"></i>
                        <div class="ms-3">
                            <h5>Manajemen Stok yang Canggih</h5>
                            <p>
                                Dengan fitur manajemen stok canggih, Anda dapat memantau jumlah barang masuk dan keluar, memberikan notifikasi saat stok menipis, dan mengelola seluruh inventaris dengan mudah dan real-time.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-box d-flex align-items-center mb-4">
                        <i class="bi bi-graph-up icon" style="font-size: 2rem; color: #28a745;"></i>
                        <div class="ms-3">
                            <h5>Laporan Penjualan yang Terperinci</h5>
                            <p>
                                Sistem kami menyajikan laporan penjualan yang akurat dan terperinci, sehingga Anda dapat menganalisis produk yang paling laris, memprediksi tren pasar, dan membuat keputusan bisnis yang lebih tepat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-box d-flex align-items-center mb-4">
                        <i class="bi bi-shield-check icon" style="font-size: 2rem; color: #ffc107;"></i>
                        <div class="ms-3">
                            <h5>Keamanan Data Terjamin</h5>
                            <p>
                                Aplikasi kami dirancang dengan keamanan yang tinggi, memastikan bahwa data inventaris dan transaksi Anda aman dari kebocoran data maupun akses yang tidak diinginkan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-box d-flex align-items-center mb-4">
                        <i class="bi bi-phone icon" style="font-size: 2rem; color: #17a2b8;"></i>
                        <div class="ms-3">
                            <h5>Akses Mudah di Mana Saja</h5>
                            <p>
                                Dapatkan akses ke data stok dan laporan penjualan kapan saja dan di mana saja, langsung dari perangkat Anda. Aplikasi kami kompatibel di berbagai platform sehingga lebih fleksibel untuk kebutuhan Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="product" class="product-section">
        <div class="container">
            <br><br><br><br>
            <h3 data-aos="fade-left" data-aos-delay="100">Produk Kami</h3>
            <p data-aos="fade-left" data-aos-delay="200">Lihat berbagai produk dan layanan yang kami tawarkan untuk membantu bisnis Anda.</p>
            <div class="row">
                <!-- Contoh produk sementara -->
                @foreach (range(1, 4) as $item)
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="{{ $item * 100 }}">
                        <div class="card">
                            <img src="{{ asset('assets/img/contoh.png') }}" class="card-img-top" alt="Produk {{ $item }}">
                            <div class="card-body">
                                <h5 class="card-title">Produk {{ $item }}</h5>
                                <p class="card-text">Deskripsi singkat produk {{ $item }} yang menjelaskan fitur atau kegunaannya.</p>
                                <a href="#" class="btn btn-outline-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="container">
            <br><br><br><br>
            <h3 data-aos="zoom-in" data-aos-delay="100">Hubungi Kami</h3>
            <div class="row mt-4">
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.2128083150837!2d104.78879391043894!3d-3.037522996925553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b9c53660a505b%3A0xcef850e05d72998a!2sKursus%20Komputer%20dan%20Bahasa%20Inggris%20PalComTech%20OPI%20Mall!5e0!3m2!1sid!2sid!4v1729831256938!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">No.Telpon:</label>
                            <input type="email" class="form-control" id="telpon" name="telpon" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="message">Pesan:</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                    </form>
                </div>
            </div>
            <br><br>
        </div>
    </section>
@endsection
