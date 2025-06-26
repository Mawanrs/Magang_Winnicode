<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil & Klasemen - WinniGP</title>
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
        <h1 class="section-title d-inline-block mb-4">Hasil & Klasemen</h1>

        <div class="row mb-4 results-filters">
            <div class="col-md-3">
                <label for="filterTahun" class="form-label">Tahun</label>
                <select class="form-select" id="filterTahun">
                    <option selected>2025</option>
                    <option>2024</option>
                    <option>2023</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="filterGrandPrix" class="form-label">Grands Prix</label>
                <select class="form-select" id="filterGrandPrix">
                    <option>Semua</option>
                    <option selected>Indonesia</option> <option>Prancis</option>
                    <option>Spanyol</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="filterTipe" class="form-label">Tipe</label>
                <select class="form-select" id="filterTipe">
                    <option selected>Hasil Balapan</option> <option>Klasemen</option> <option>Kualifikasi</option>
                    <option>Latihan Bebas</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="filterKategori" class="form-label">Kategori</label>
                <select class="form-select" id="filterKategori">
                    <option selected>MotoGP</option>
                    <option>Moto2</option>
                    <option>Moto3</option>
                    <option>MotoE</option>
                </select>
            </div>
        </div>

        <ul class="nav nav-tabs nav-tabs-custom mb-3" id="resultTypeTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="race-result-tab" data-bs-toggle="tab" data-bs-target="#race-result-content" type="button" role="tab">Hasil Balapan</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="standings-tab" data-bs-toggle="tab" data-bs-target="#standings-content" type="button" role="tab">Klasemen</button>
            </li>
        </ul>

        <div class="tab-content" id="resultTypeTabContent">
            <div class="tab-pane fade show active" id="race-result-content" role="tabpanel" aria-labelledby="race-result-tab">
                <h3 class="mb-3">Hasil Balapan - MotoGP Indonesia 2025</h3>
                <div class="weather-info mb-3">
                    <span><strong>Tanah:</strong> 19º</span>
                    <span><strong>Kelembapan:</strong> 80%</span>
                    <span><strong>Kondisi Lintasan:</strong> Kering</span>
                    <span><strong>Hujan Lebat:</strong> 16º</span> </div>

                <div class="table-responsive">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th>Pos.</th>
                                <th>Poin</th>
                                <th>Pembalap</th>
                                <th>Tim</th>
                                <th>Waktu/Gap</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>25</td>
                                <td>J.Zarco</td>
                                <td>Castrol Honda LCR</td>
                                <td>45:47.541</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>20</td> <td>Pembalap B</td>
                                <td>Tim Y</td>
                                <td>+19.907</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>16</td> <td>Pembalap C</td>
                                <td>Tim Z</td>
                                <td>+22.500</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>1</td> <td>Pembalap O</td>
                                <td>Tim Alpha</td>
                                <td>+1:05.123</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Tidak Diklasifikasikan</h4>
                 <div class="table-responsive">
                    <table class="table table-custom">
                        <tbody>
                            <tr><td>J.Zarco</td><td>Castrol Honda LCR</td><td>22 Laps</td></tr> </tbody>
                    </table>
                </div>

                <h4 class="mt-4">Tidak Finis Lap 1</h4>
                 <div class="table-responsive">
                    <table class="table table-custom">
                        <tbody>
                            <tr><td>Pembalap X</td><td>Tim Omega</td><td>DNF</td></tr></tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="standings-content" role="tabpanel" aria-labelledby="standings-tab">
                <h3 class="mb-3" id="klasemen">Klasemen Pembalap - MotoGP 2025</h3>
                <div class="table-responsive">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th>Pos.</th>
                                <th>Pembalap</th>
                                <th>Tim</th>
                                <th>Poin</th>
                                <th>Gap</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>M.Marquez</td>
                                <td>Ducati Lenovo Team</td>
                                <td>171</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>M.Marquez</td> <td>Ducati Lenovo Team</td>
                                <td>149</td>
                                <td>-22</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>M.Marquez</td> <td>Ducati Lenovo Team</td>
                                <td>120</td>
                                <td>-51</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>J.Zarco</td>
                                <td>Castrol Honda LCR</td>
                                <td>110</td>
                                <td>-61</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                 <h3 class="mt-5 mb-3">Klasemen Tim - MotoGP 2025</h3>
                <div class="table-responsive">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th>Pos.</th>
                                <th>Tim</th>
                                <th>Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ducati Lenovo Team</td>
                                <td>320</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Aprilia Racing</td>
                                <td>280</td>
                            </tr>
                             </tbody>
                    </table>
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