<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pertandingan - WinniGP</title>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="section-title d-inline-block mb-0">Jadwal Pertandingan 2025</h1>
            <img src="img/flag_spain_large.png" alt="Spanish Flag" style="height: 40px;"> </div>

        <ul class="nav nav-tabs nav-tabs-custom mb-3" id="scheduleTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#ongoing" type="button" role="tab" aria-controls="ongoing" aria-selected="true">Sedang Berlangsung</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="finished-tab" data-bs-toggle="tab" data-bs-target="#finished" type="button" role="tab" aria-controls="finished" aria-selected="false">Finished</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab" aria-controls="upcoming" aria-selected="false">Akan Datang</button>
            </li>
        </ul>

        <div class="tab-content" id="scheduleTabContent">
            <div class="tab-pane fade show active" id="ongoing" role="tabpanel" aria-labelledby="ongoing-tab">
                <p>Tidak ada balapan yang sedang berlangsung saat ini.</p>
                </div>

            <div class="tab-pane fade" id="finished" role="tabpanel" aria-labelledby="finished-tab">
                <div class="schedule-item">
                    <div class="event-info">
                        <h5><img src="img/flag_thailand.png" alt="Thailand Flag" class="me-2" style="height:20px;"> 1 Thailand - PT.XYZ</h5>
                        <p>Sirkuit Internasional Chang | 01 Jan - 03 Jan</p>
                    </div>
                    <span class="badge bg-secondary status-badge">Finished</span>
                </div>
                <div class="schedule-item">
                    <div class="event-info">
                        <h5><img src="img/flag_france.png" alt="French Flag" class="me-2" style="height:20px;"> French GP - Le Mans</h5>
                        <p>Sirkuit Bugatti | 12 Mei - 14 Mei</p>
                    </div>
                    <span class="badge bg-secondary status-badge">Finished</span>
                </div>
                <div class="schedule-item">
                    <div class="event-info">
                        <h5><img src="img/flag_italy.png" alt="Italian Flag" class="me-2" style="height:20px;"> Italian GP - Mugello</h5>
                        <p>Sirkuit Mugello | 28 Apr - 30 Apr</p>
                    </div>
                    <span class="badge bg-secondary status-badge">Finished</span>
                </div>
            </div>

            <div class="tab-pane fade" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                <div class="schedule-item">
                    <div class="event-info">
                        <h5><img src="img/flag_uk.png" alt="UK Flag" class="me-2" style="height:20px;"> British GP - Silverstone</h5>
                        <p>Sirkuit Silverstone | 23 Agu - 25 Agu</p>
                    </div>
                     <a href="tickets.html" class="btn btn-sm btn-danger-custom">Info Tiket</a>
                </div>
                 <div class="schedule-item">
                    <div class="event-info">
                        <h5><img src="img/flag_japan.png" alt="Japan Flag" class="me-2" style="height:20px;"> Japanese GP - Motegi</h5>
                        <p>Mobility Resort Motegi | 15 Sep - 17 Sep</p>
                    </div>
                    <a href="tickets.html" class="btn btn-sm btn-danger-custom">Info Tiket</a>
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