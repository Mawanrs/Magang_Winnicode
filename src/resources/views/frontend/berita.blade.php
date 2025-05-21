<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita MotoGP - WinniGP</title>
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
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="section-title d-inline-block mb-4">Berita</h1>
                    <ul class="nav nav-pills nav-tabs-custom mb-3" id="newsTypeTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="laporanGP-tab" data-bs-toggle="tab" data-bs-target="#laporanGP-content" type="button" role="tab">LaporanGP</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="winniGPNews-tab" data-bs-toggle="tab" data-bs-target="#winniGPNews-content" type="button" role="tab">WinniGP News</button>
                        </li>
                    </ul>
                </div>


                <div class="tab-content" id="newsTypeTabContent">
                    <div class="tab-pane fade show active" id="laporanGP-content" role="tabpanel">
                        <div class="card-custom mb-4">
                            <img src="img/marc_marquez_rekor_rossi.jpg" class="card-img-top" alt="Marc Marquez Rekor Rossi"> <div class="card-body">
                                <h2 class="card-title">MARC MARQUEZ MENUJU REKOR PODIUM VALENTINO ROSSI</h2>
                                <p class="card-text">Dengan performa konsistennya musim ini, Marc Marquez semakin mendekati rekor jumlah podium yang dipegang oleh legenda MotoGP, Valentino Rossi. Akankah ia berhasil melampauinya tahun ini?</p>
                                <a href="news_detail_marquez_rossi.html" class="btn btn-danger-custom">Baca Sekarang</a>
                            </div>
                        </div>

                        <h3 class="section-title">Berita Terbaru</h3>
                        <div class="news-item-sm"> <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="img/quartararo_selamat_zarco.jpg" class="img-fluid rounded-start" alt="Quartararo Zarco">
                                </div>
                                <div class="col-md-8">
                                    <div class="ps-md-3">
                                        <h5 class="news-title">Quartararo Beri Selamat untuk Zarco, meski Telan Kekecewaan</h5>
                                        <p class="news-meta"> <small>12 Mei 2025</small> <br> Bintang Yamaha itu start dari pole position, tetapi terjatuh di Le Mans, saat ia menyaksikan kompatriotnya menorehkan sejarah. </p>
                                        <a href="news_detail_quartararo.html" class="btn btn-sm btn-outline-light-custom">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="news-item-sm mt-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="img/analisis_strategi_ban.jpg" class="img-fluid rounded-start" alt="Strategi Ban">
                                </div>
                                <div class="col-md-8">
                                    <div class="ps-md-3">
                                        <h5 class="news-title">Analisis Mendalam: Strategi Ban di GP Prancis yang Kacau</h5>
                                        <p class="news-meta"> <small>12 Mei 2025</small> <br> Pilihan ban menjadi krusial di balapan Le Mans yang penuh drama dan perubahan cuaca. </p>
                                        <a href="#" class="btn btn-sm btn-outline-light-custom">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="tab-pane fade" id="winniGPNews-content" role="tabpanel">
                        <p>Konten WinniGP News akan segera tersedia.</p>
                    </div>
                </div>


            </div>

            <div class="col-lg-4">
                <div class="card-custom mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Klasemen MotoGP™</h5>
                        <table class="table table-sm table-borderless table-custom">
                            <thead>
                                <tr><th>Pos</th><th>Pembalap</th><th>Tim</th><th>Poin</th></tr>
                            </thead>
                            <tbody>
                                <tr><td>1</td><td>M.Marquez</td><td>Ducati Lenovo</td><td>171</td></tr> <tr><td>2</td><td>M.Marquez</td><td>Ducati Lenovo</td><td>149</td></tr> <tr><td>3</td><td>M.Marquez</td><td>Ducati Lenovo</td><td>120</td></tr> </tbody>
                        </table>
                        <a href="results.html#klasemen" class="btn btn-outline-light-custom btn-sm d-block">Klasemen Lengkap</a>
                    </div>
                </div>

                <div class="card-custom mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Video Populer</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent border-secondary px-0"><a href="#" class="text-light">Highlight GP Prancis 2025</a></li>
                            <li class="list-group-item bg-transparent border-secondary px-0"><a href="#" class="text-light">Wawancara Eksklusif Johann Zarco</a></li>
                            <li class="list-group-item bg-transparent border-secondary px-0"><a href="#" class="text-light">Momen-momen Dramatis Le Mans</a></li>
                        </ul>
                    </div>
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