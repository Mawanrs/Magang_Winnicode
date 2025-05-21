<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WinniGP - Berita MotoGP Terkini</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="/">
        <span class="navbar-brand-winni">WinniGP</span><br />
        <span class="navbar-brand-garuda">GARUDA TEKNOLOGI</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
          <a href="login.html" class="btn btn-signin btn-sign me-2">Masuk</a>
          <a href="create_account.html" class="btn btn-signup btn-sign">Daftar</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Konten Utama -->
  <div class="container container-main">
    <div class="row">
      <!-- Kolom Kiri: Berita Utama & List -->
      <div class="col-lg-8 mb-4">
        <!-- Berita Unggulan -->
        <div class="featured-news-lg">
          <img src="img/zarco_le_mans.jpg" alt="Johann Zarco Le Mans" />
          <div class="caption">
            <h2>JOHANN ZARCO MENANGI GP PRANCIS YANG CHAOS DI LE MANS</h2>
            <p class="d-none d-md-block">Grand Prix tak terlupakan dengan drama dari awal hingga akhir, serta luapan emosional dalam wujud pemenang yang mengejutkan.</p>
            <a href="/detail_berita" class="btn btn-danger-custom">BACA SEKARANG</a>
          </div>
        </div>

        <!-- Berita Kecil -->
        <div class="row">
          <div class="col-md-4">
            <div class="news-item-sm">
              <img src="img/news_thumb1.jpg" alt="Berita 1" />
              <div>
                <h5 class="news-title">Zarco Emosional Menang di Le Mans</h5>
                <p class="news-meta"><i class="bi bi-clock"></i> 1 jam lalu</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="news-item-sm">
              <img src="img/news_thumb2.jpg" alt="Berita 2" />
              <div>
                <h5 class="news-title">Quartararo Terjatuh di Tikungan</h5>
                <p class="news-meta"><i class="bi bi-clock"></i> 2 jam lalu</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="news-item-sm">
              <img src="img/news_thumb3.jpg" alt="Berita 3" />
              <div>
                <h5 class="news-title">Drama Multi-Pembalap GP Prancis</h5>
                <p class="news-meta"><i class="bi bi-clock"></i> 3 jam lalu</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Kolom Kanan: Klasemen dan Momen -->
      <div class="col-lg-4">
        <!-- Klasemen -->
        <div class="card-custom mb-4">
          <div class="card-body">
            <h5 class="card-title">Klasemen Pembalap MotoGP™</h5>
            <table class="table table-sm table-borderless table-custom">
              <thead>
                <tr>
                  <th>Pos</th><th>Pembalap</th><th>Tim</th><th>Poin</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>1</td><td>M.Marquez</td><td>Ducati</td><td>171</td></tr>
                <tr><td>2</td><td>F.Quartararo</td><td>Yamaha</td><td>149</td></tr>
                <tr><td>3</td><td>B.Binder</td><td>KTM</td><td>120</td></tr>
              </tbody>
            </table>
            <a href="/results.html#klasemen" class="btn btn-outline-light-custom btn-sm d-block">Klasmen Lengkap</a>
          </div>
        </div>

        <!-- Momen Terbaik -->
        <div class="card-custom mb-4">
          <img src="img/motogp_moments.jpg" class="card-img-top" alt="Momen MotoGP" />
          <div class="card-body">
            <h5 class="card-title">Momen Terbaik GP Prancis 2025</h5>
            <p class="card-text">Lihat momen penting dari balapan gila di Le Mans.</p>
            <a href="/berita" class="btn btn-danger-custom">Baca Sekarang</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Video Section -->
    <section class="mt-4">
      <h3 class="section-title">Video Terbaru <a href="#" class="btn btn-sm btn-outline-light-custom float-end">Lebih Banyak</a></h3>
      <div class="row">
        <div class="col-md-3">
          <div class="card-custom">
            <img src="img/video_thumb1.jpg" class="card-img-top" alt="Video 1" />
            <div class="card-body">
              <h6 class="card-title">Zarco Disambut Hangat</h6>
              <p class="card-text"><small class="text-muted"><i class="bi bi-play-circle-fill"></i> 02:22:00</small></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-custom">
            <img src="img/video_thumb2.jpg" class="card-img-top" alt="Video 2" />
            <div class="card-body">
              <h6 class="card-title">Highlight Le Mans</h6>
              <p class="card-text"><small class="text-muted"><i class="bi bi-play-circle-fill"></i> 01:23:00</small></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-custom">
            <img src="img/video_thumb3.jpg" class="card-img-top" alt="Video 3" />
            <div class="card-body">
              <h6 class="card-title">Analisis Pasca Balapan</h6>
              <p class="card-text"><small class="text-muted"><i class="bi bi-play-circle-fill"></i> 01:32:00</small></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-custom">
            <img src="img/video_thumb4.jpg" class="card-img-top" alt="Video 4" />
            <div class="card-body">
              <h6 class="card-title">Interview Zarco</h6>
              <p class="card-text"><small class="text-muted"><i class="bi bi-play-circle-fill"></i> 01:23:00</small></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Berita Terbaru -->
    <section class="mt-5">
      <h3 class="section-title">Berita Terbaru <a href="/berita" class="btn btn-sm btn-outline-light-custom float-end">Lebih Banyak</a></h3>
      <div class="row">
        <div class="col-md-4">
          <div class="card-custom">
            <img src="img/news_thumb1.jpg" class="card-img-top" alt="Berita 1" />
            <div class="card-body">
              <h5 class="card-title">Quartararo Ucapkan Selamat untuk Zarco</h5>
              <p class="card-text">Bintang Yamaha terjatuh di Le Mans, namun tetap memberi dukungan.</p>
              <a href="news_detail.html" class="btn btn-outline-light-custom">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-custom">
            <img src="img/news_thumb2.jpg" class="card-img-top" alt="Berita 2" />
            <div class="card-body">
              <h5 class="card-title">Strategi Ban yang Jadi Penentu</h5>
              <p class="card-text">Tim-tim MotoGP memutar strategi untuk kondisi cuaca tak menentu.</p>
              <a href="news_detail.html" class="btn btn-outline-light-custom">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-custom">
            <img src="img/news_thumb3.jpg" class="card-img-top" alt="Berita 3" />
            <div class="card-body">
              <h5 class="card-title">Kondisi Pembalap Pasca Insiden</h5>
              <p class="card-text">Berikut kabar terkini dari para rider yang mengalami crash di Le Mans.</p>
              <a href="news_detail.html" class="btn btn-outline-light-custom">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Footer -->
  <footer class="footer-custom mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
          <h5>WinniGP</h5>
          <p>Portal berita digital Grand Prix terlengkap dan terpercaya.</p>
          <strong>Sponsor Resmi:</strong><br />
          <img src="img/logo_sponsor1.png" height="30" class="me-2" alt="Sponsor 1" />
          <img src="img/logo_sponsor2.png" height="30" alt="Sponsor 2" />
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Informasi</h5>
          <ul class="list-unstyled">
            <li><a href="schedule.html">Jadwal Pertandingan</a></li>
            <li><a href="results.html">Hasil & Klasemen</a></li>
            <li><a href="tickets.html">Harga Tiket</a></li>
            <li><a href="index.html">Berita</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Sitemap</h5>
          <ul class="list-unstyled">
            <li><a href="index.html">Beranda</a></li>
            <li><a href="/berita">Berita</a></li>
            <li><a href="#">Kontak Kami</a></li>
            <li><a href="#">Privasi & Policy</a></li>
            <li><a href="#">Tentang</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5>Bagikan</h5>
          <div class="social-icons">
            <a href="#" class="text-light"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-light"><i class="bi bi-twitter"></i></a>
            <a href="#" class="text-light"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-light"><i class="bi bi-youtube"></i></a>
            <span class="ms-2">FOX</span>
          </div>
        </div>
      </div>
      <div class="text-center p-3 mt-4" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2025 WinniGP by Winni Code & GARUDA TEKNOLOGI. All rights reserved.
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
