<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Harga Tiket - WinniGP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <span class="navbar-brand-winni">WinniGP</span>
                <span class="navbar-brand-garuda">GARUDA TEKNOLOGI</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="/jadwal">Jadwal Pertandingan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/hasil-dan-klasemen">Hasil & Klasemen</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pembalap_dan_tim">Pembalap & Tim</a></li>
                    <li class="nav-item"><a class="nav-link" href="/info_harga_tiket">Info Harga Tiket</a></li>
                </ul>
                <div class="d-flex">
                    <a href="login.html" class="btn btn-outline-light-custom btn-sign">Masuk</a>
                    <a href="create_account.html" class="btn btn-danger-custom btn-sign">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="text-center mb-4">
            <h1 class="section-title d-inline-block">Informasi Harga TIKET</h1>
            <p class="lead">Musim MotoGP™ 2025 telah HADIR. Jangan hanya menonton - jadilah bagian dari aksinya SECARA LANGSUNG. Lihat kalendernya SEKARANG! [cite: 8, 9]</p>
        </div>

        <h3 class="mb-3">2025 MotoGP™ WORLD CHAMPIONSHIP [cite: 10]</h3>
        <div class="row mb-5">
            <div class="col-md-4 col-lg-3 mb-3"> <div class="ticket-item text-center">
                    <img src="img/flag_uk.png" alt="British GP" class="mb-2" style="width: 50px;"> <h4>British GP</h4>
                    <p class="text-muted">23-25 May</p>
                    <a href="#british_gp_detail" class="btn btn-danger-custom" data-bs-toggle="collapse" aria-expanded="false" aria-controls="british_gp_detail">LIHAT SEKARANG</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 mb-3">
                <div class="ticket-item text-center">
                     <img src="img/flag_spain.png" alt="Spanish GP" class="mb-2" style="width: 50px;">
                    <h4>Spanish GP</h4>
                    <p class="text-muted">10-12 June</p>
                    <a href="#" class="btn btn-danger-custom">LIHAT SEKARANG</a>
                </div>
            </div>
            </div>


        <div class="collapse" id="british_gp_detail">
            <hr class="my-4">
            <nav aria-label="breadcrumb" class="breadcrumb-custom"> <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="tickets.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Great Britain</li>
                </ol>
            </nav>
            <h2 class="section-title d-inline-block">Harga Tiket - British GP</h2>
            <p>Lihatlah Harga Tiket Anda Sebelum Berangkat Menonton Langsung! [cite: 13]</p>

            <ul class="nav nav-pills mb-3 ticket-category-filter" id="ticketCategoryTab" role="tablist"> <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tribun-penonton-tab" data-bs-toggle="tab" data-bs-target="#tribun-penonton" type="button" role="tab" aria-controls="tribun-penonton" aria-selected="true">Tribun Penonton</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tribun-penggemar-tab" data-bs-toggle="tab" data-bs-target="#tribun-penggemar" type="button" role="tab" aria-controls="tribun-penggemar" aria-selected="false">Tribun Penggemar</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tribun-umum-tab" data-bs-toggle="tab" data-bs-target="#tribun-umum" type="button" role="tab" aria-controls="tribun-umum" aria-selected="false">Tribun Umum</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="british-gallery-tab" data-bs-toggle="tab" data-bs-target="#british-gallery" type="button" role="tab" aria-controls="british-gallery" aria-selected="false">British Gallery</button>
                </li>
            </ul>

            <div class="tab-content" id="ticketCategoryTabContent">
                <div class="tab-pane fade show active" id="tribun-penonton" role="tabpanel" aria-labelledby="tribun-penonton-tab">
                    <h5>Tersedia Harga berdasarkan kategori: Tribun Penonton [cite: 18]</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card-custom">
                                <div class="card-body">
                                    <h5 class="card-title">Luffield</h5>
                                    <p class="card-text">Akses ke tribun Luffield dengan pemandangan عالی.</p>
                                    <p class="fs-4 fw-bold">Mulai dari 123$</p>
                                    <a href="#" class="btn btn-danger-custom w-100">Pesan Sekarang</a>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-4 mb-3">
                            <div class="card-custom">
                                <div class="card-body">
                                    <h5 class="card-title">Woodcote</h5>
                                    <p class="card-text">Nikmati aksi di tikungan Woodcote.</p>
                                    <p class="fs-4 fw-bold">Mulai dari 110$</p>
                                    <a href="#" class="btn btn-danger-custom w-100">Pesan Sekarang</a>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                <div class="tab-pane fade" id="tribun-penggemar" role="tabpanel" aria-labelledby="tribun-penggemar-tab">
                    <h5>Tersedia Harga berdasarkan kategori: Tribun Penggemar</h5>
                    <p>Detail harga untuk tribun penggemar akan segera tersedia.</p>
                </div>
                <div class="tab-pane fade" id="tribun-umum" role="tabpanel" aria-labelledby="tribun-umum-tab">
                    <h5>Tersedia Harga berdasarkan kategori: Tribun Umum</h5>
                     <p>Detail harga untuk tribun umum akan segera tersedia.</p>
                </div>
                <div class="tab-pane fade" id="british-gallery" role="tabpanel" aria-labelledby="british-gallery-tab">
                    <h5>Tersedia Harga berdasarkan kategori: British Gallery</h5>
                    <p>Detail harga untuk British Gallery akan segera tersedia.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer-custom mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="text-uppercase">WinniGP</h5>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="text-uppercase">Informasi</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="schedule.html">Jadwal Pertandingan</a></li>
                        <li><a href="results.html">Hasil & Klasemen</a></li>
                        <li><a href="tickets.html">Informasi Harga Tiket</a></li>
                        <li><a href="index.html">Berita</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="text-uppercase">Sitemap</h5>
                    <ul class="list-unstyled mb-0">
                         <li><a href="index.html">Beranda</a></li>
                        <li><a href="news.html">Berita</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                        <li><a href="#">Privasi & Policy</a></li>
                        <li><a href="#">Tentang</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase">Bagikan</h5>
                    <div class="social-icons">
                        <a href="#" class="text-light"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-twitter"></i></a>
                         <span class="ms-2">FOX</span>
                    </div>
                </div>
            </div>
             <div class="text-center p-3 mt-4" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2025 WinniGP. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>