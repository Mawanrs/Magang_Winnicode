<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembalap & Tim - WinniGP</title>
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
        <h1 class="section-title d-inline-block mb-4">Pembalap & Tim</h1>

        <ul class="nav nav-tabs nav-tabs-custom mb-3" id="mainRiderTeamTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pembalap-main-tab" data-bs-toggle="tab" data-bs-target="#pembalap-main-content" type="button" role="tab" aria-controls="pembalap-main-content" aria-selected="true">Pembalap</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tim-main-tab" data-bs-toggle="tab" data-bs-target="#tim-main-content" type="button" role="tab" aria-controls="tim-main-content" aria-selected="false">Tim</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="legenda-main-tab" data-bs-toggle="tab" data-bs-target="#legenda-main-content" type="button" role="tab" aria-controls="legenda-main-content" aria-selected="false">Legenda</button>
            </li>
        </ul>

        <div class="tab-content" id="mainRiderTeamTabContent">
            <div class="tab-pane fade show active" id="pembalap-main-content" role="tabpanel" aria-labelledby="pembalap-main-tab">
                <ul class="nav nav-pills nav-tabs-custom mb-3" id="riderCategoryTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="motogp-rider-tab" data-bs-toggle="tab" data-bs-target="#motogp-rider-content" type="button" role="tab">MotoGP</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="moto2-rider-tab" data-bs-toggle="tab" data-bs-target="#moto2-rider-content" type="button" role="tab">Moto2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="moto3-rider-tab" data-bs-toggle="tab" data-bs-target="#moto3-rider-content" type="button" role="tab">Moto3</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="motoe-rider-tab" data-bs-toggle="tab" data-bs-target="#motoe-rider-content" type="button" role="tab">MotoE</button>
                    </li>
                </ul>
                <div class="tab-content tab-content-custom" id="riderCategoryTabContent">
                    <div class="tab-pane fade show active" id="motogp-rider-content" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="card-custom text-center">
                                    <img src="img/jorge_martin.png" class="card-img-top" alt="Jorge Martin"> <div class="card-body">
                                        <h5 class="card-title">#JM1 Jorge Martin</h5>
                                        <p class="rider-nationality"><img src="img/flag_spain.png" alt="Spain Flag" class="rider-card-img"> Spain | Aprilia Racing</p>
                                        <a href="#" class="btn btn-sm btn-outline-light-custom">Lihat Profil</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-4">
                                 <div class="card-custom text-center">
                                    <img src="img/marc_marquez.png" class="card-img-top" alt="Marc Marquez">
                                    <div class="card-body">
                                        <h5 class="card-title">#MM93 Marc Marquez</h5>
                                        <p class="rider-nationality"><img src="img/flag_spain.png" alt="Spain Flag" class="rider-card-img"> Spain | Ducati Lenovo Team</p>
                                        <a href="#" class="btn btn-sm btn-outline-light-custom">Lihat Profil</a>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6 col-lg-3 mb-4">
                                 <div class="card-custom text-center">
                                    <img src="img/fabio_quartararo.png" class="card-img-top" alt="Fabio Quartararo">
                                    <div class="card-body">
                                        <h5 class="card-title">#FQ20 Fabio Quartararo</h5>
                                        <p class="rider-nationality"><img src="img/flag_france.png" alt="France Flag" class="rider-card-img"> France | Monster Energy Yamaha</p>
                                        <a href="#" class="btn btn-sm btn-outline-light-custom">Lihat Profil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="moto2-rider-content" role="tabpanel">
                        <p>Daftar pembalap Moto2 akan segera tersedia.</p>
                    </div>
                    <div class="tab-pane fade" id="moto3-rider-content" role="tabpanel">
                        <p>Daftar pembalap Moto3 akan segera tersedia.</p>
                    </div>
                    <div class="tab-pane fade" id="motoe-rider-content" role="tabpanel">
                        <p>Daftar pembalap MotoE akan segera tersedia.</p>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tim-main-content" role="tabpanel" aria-labelledby="tim-main-tab">
                 <ul class="nav nav-pills nav-tabs-custom mb-3" id="teamCategoryTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="motogp-team-tab" data-bs-toggle="tab" data-bs-target="#motogp-team-content" type="button" role="tab">MotoGP</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="moto2-team-tab" data-bs-toggle="tab" data-bs-target="#moto2-team-content" type="button" role="tab">Moto2</button>
                    </li>
                     </ul>
                <div class="tab-content tab-content-custom" id="teamCategoryTabContent">
                    <div class="tab-pane fade show active" id="motogp-team-content" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card-custom">
                                    <img src="img/team_aprilia.png" class="card-img-top" alt="Aprilia Racing Logo"> <div class="card-body">
                                        <h5 class="card-title">Aprilia Racing</h5>
                                        <p class="card-text">Pembalap:</p>
                                        <ul class="list-unstyled small">
                                            <li><img src="img/flag_spain.png" alt="Spain" class="rider-card-img"> Jorge Martin</li>
                                            <li><img src="img/flag_italy.png" alt="Italy" class="rider-card-img"> Marco Bezzecchi</li>
                                        </ul>
                                        <a href="#" class="btn btn-sm btn-outline-light-custom">Detail Tim</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card-custom">
                                    <img src="img/team_ducati_lenovo.png" class="card-img-top" alt="Ducati Lenovo Team Logo">
                                    <div class="card-body">
                                        <h5 class="card-title">Ducati Lenovo Team</h5>
                                        <p class="card-text">Pembalap:</p>
                                        <ul class="list-unstyled small">
                                            <li><img src="img/flag_spain.png" alt="Spain" class="rider-card-img"> Marc Marquez</li>
                                            <li><img src="img/flag_italy.png" alt="Italy" class="rider-card-img"> Francesco Bagnaia</li>
                                        </ul>
                                        <a href="#" class="btn btn-sm btn-outline-light-custom">Detail Tim</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="tab-pane fade" id="moto2-team-content" role="tabpanel">
                        <p>Daftar tim Moto2 akan segera tersedia.</p>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="legenda-main-content" role="tabpanel" aria-labelledby="legenda-main-tab">
                 <div class="tab-content-custom">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card-custom text-center">
                                <img src="img/valentino_rossi.png" class="card-img-top" alt="Valentino Rossi"> <div class="card-body">
                                    <h5 class="card-title">Valentino Rossi</h5>
                                    <p class="rider-nationality"><img src="img/flag_italy.png" alt="Italy Flag" class="rider-card-img"> Italy</p>
                                    <p class="card-text small text-muted">Tahun Aktif: 1996 - 2021</p>
                                    <a href="#" class="btn btn-sm btn-outline-light-custom">Lihat Profil</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <div class="card-custom text-center">
                                <img src="img/giacomo_agostini.png" class="card-img-top" alt="Giacomo Agostini">
                                <div class="card-body">
                                    <h5 class="card-title">Giacomo Agostini</h5>
                                    <p class="rider-nationality"><img src="img/flag_italy.png" alt="Italy Flag" class="rider-card-img"> Italy</p>
                                    <p class="card-text small text-muted">Tahun Aktif: 1964 - 1977</p>
                                    <a href="#" class="btn btn-sm btn-outline-light-custom">Lihat Profil</a>
                                </div>
                            </div>
                        </div>
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