@extends('layouts.app')
@section('body-class', 'light-bg')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/hasilklasemen.css') }}">
@endpush

@section('content')

{{-- ==== HEADER WINNICODE ==== --}}
<div class="winnicode-topbar text-center py-3">
    <img src="{{ asset('storage/banner-logo (1).png') }}" alt="Winni Code" class="winnicode-logo">
</div>
<hr class="winnicode-line">

{{-- ==== NAVBAR ==== --}}
<nav class="navbar navbar-expand-lg navbar-dark winni-navbar">
  <div class="container-fluid">
    <button id="openSidebarBtn" class="btn btn-link p-0 me-2" type="button" style="font-size:2.1rem;">
      <span class="winnicode-menuicon"></span>
    </button>
    <a class="navbar-brand d-flex align-items-center me-3" href="/">
      <span class="fw-bold winni-navbar-brand">WinniGP</span>
    </a>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold winni-navbar-menu">
        <li class="nav-item"><a class="nav-link px-3" href="/jadwal">Jadwal Pertandingan</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/hasil-dan-klasemen">Hasil & Klasemen</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/pembalap_dan_tim">Pembalap & Legenda</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/videos">Video</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/berita">Berita</a></li>
      </ul>
      <ul class="navbar-nav ms-auto align-items-center fw-bold winni-navbar-auth">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}">Masuk</a>
          </li>
          <li class="nav-item">
            <span class="winni-auth-divider">|</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/register') }}">Daftar</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               style="color: #eee8e8; font-weight: 600;">Keluar</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/profile') }}">Selamat Datang, {{ Auth::user()->name }}</a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>


{{-- SIDEBAR OVERLAY + MENU--}}
<div id="sidebarOverlay" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.08); z-index:1099;"></div>
<aside id="sidebarMenu" style="position:fixed; top:0; left:-320px; width:320px; height:100vh; background:#fff; z-index:1200; transition: left .28s cubic-bezier(.9,0,.42,1.13); box-shadow:2px 0 16px #2222;">
  <div class="p-4 pb-1 d-flex align-items-center">
    <button id="closeSidebarBtn" class="btn btn-link p-0 me-3" style="font-size:2rem;">&times;</button>
    <img src="{{ asset('storage/banner-logo (1).png') }}" alt="MotoGP" style="height:40px;">
  </div>
  <ul class="list-unstyled ps-4 pe-4 mb-3" style="font-size:1.17em;">
    <li class="mb-3"><a href="/jadwal" class="text-dark text-decoration-none">Jadwal Pertandingan</a></li>
    <li class="mb-3"><a href="/hasil_dan_klasemen" class="text-dark text-decoration-none">Hasil & Klasemen</a></li>
    <li class="mb-3"><a href="/pembalap_dan_tim" class="text-dark text-decoration-none">Pembalap & Legenda</a></li>
    <li class="mb-3"><a href="/videos" class="text-dark text-decoration-none">Video</a></li>
    <li class="mb-3"><a href="/berita" class="text-dark text-decoration-none">Berita</a></li>
  </ul>
</aside>

{{-- === Content Area === --}}
<div class="container mt-4">
    <h1 class="section-title mb-4">Hasil & Klasemen</h1>

    {{-- Filter kategori --}}
    <form method="GET" action="{{ route('hasil_dan_klasemen') }}" class="mb-4">
    <div class="row g-3 align-items-center">

        <!-- Kategori Filter -->
        <div class="col-auto">
            <label for="kategori" class="form-label">Kategori:</label>
        </div>
        <div class="col-auto">
            <select name="kategori" id="kategori" class="form-select custom-select" onchange="this.form.submit()">
                <option value="MOTOGP" {{ request('kategori') == 'MOTOGP' ? 'selected' : '' }}>MotoGP</option>
                <option value="MOTO2" {{ request('kategori') == 'MOTO2' ? 'selected' : '' }}>Moto2</option>
                <option value="MOTO3" {{ request('kategori') == 'MOTO3' ? 'selected' : '' }}>Moto3</option>
                <option value="MOTOE" {{ request('kategori') == 'MOTOE' ? 'selected' : '' }}>MotoE</option>
            </select>
        </div>
    </div>
</form>

    {{-- Tab Navigation --}}
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#hasil">Hasil Balapan</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#klasemen">Klasemen</button>
        </li>
    </ul>

    <div class="tab-content">
        {{-- Tab Hasil Balapan --}}
        <div class="tab-pane fade show active" id="hasil">
            <h3>Hasil Balapan - {{ $kategori }}</h3>
        
        {{-- Weather Information --}}
        <div class="weather-info">
            <span>
                <i class="bi bi-cloud" style="font-size: 1.2rem; margin-right: 5px;"></i>
                <strong>Cuaca:</strong> {{ $cuaca->cuaca }}
            </span>
            <span>
                <i class="bi bi-thermometer" style="font-size: 1.2rem; margin-right: 5px;"></i>
                <strong>Suhu Udara:</strong> {{ $cuaca->suhu_udara }}º
            </span>
            <span>
                <i class="bi bi-thermometer" style="font-size: 1.2rem; margin-right: 5px;"></i>
                <strong>Suhu Tanah:</strong> {{ $cuaca->suhu_tanah }}º
            </span>
            <span>
                <i class="bi bi-droplet" style="font-size: 1.2rem; margin-right: 5px;"></i>
                <strong>Kelembapan:</strong> {{ $cuaca->kelembapan }}%
            </span>
            <span>
                <i class="bi bi-flag" style="font-size: 1.2rem; margin-right: 5px;"></i>
                <strong>Lintasan:</strong> {{ $cuaca->kondisi_lintasan }}
            </span>
        </div>

            {{-- Hasil Balapan --}}
            @if($hasilBalapan->isEmpty())
                <div class="alert alert-warning">Tidak ada hasil balapan untuk kategori ini.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Pos</th>
                                <th>Pembalap</th>
                                <th>Tim</th>
                                <th>Waktu/Gap</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hasilBalapan as $hasil)
                                <tr>
                                    <td>{{ $hasil->posisi }}</td>
                                    <td>{{ $hasil->pembalap }}</td>
                                    <td>{{ $hasil->tim }}</td>
                                    <td>{{ $hasil->waktu_gap ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        {{-- Tab Klasemen --}}
        <div class="tab-pane fade" id="klasemen">
            <h3>Klasemen Tim - {{ $kategori }}</h3>

            @if($klasemenTim->isEmpty())
                <div class="alert alert-warning">Data klasemen tim belum tersedia untuk kategori {{ $kategori }}.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-custom">
                        <thead>
                            <tr>
                                <th>Pos</th>
                                <th>Tim</th>
                                <th>Pembalap</th>
                                <th>Poin</th>
                                <th>Gap</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($klasemenTim as $tim)
                                <tr>
                                    <td>{{ $tim->posisi }}</td>
                                    <td>{{ $tim->tim }}</td>
                                    <td>{{ $tim->pembalap }}</td>
                                    <td>{{ $tim->poin }}</td>
                                    <td>{{ $tim->gap ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>


{{-- FOOTER --}}
  <footer class="footer-wgp">
    <div class="footer-wgp-head">
      <div class="footer-wgp-title">WinniGP</div>
      <div class="footer-wgp-sponsor">Sponsor Resmi</div>
      <div class="footer-wgp-logo">
        <img src="{{ asset('storage/logo (1).png') }}" alt="WinniGP" />
      </div>
    </div>
    <div class="footer-wgp-divider"></div>
    <div class="footer-wgp-bottom">
      <div class="footer-wgp-col">
        <div class="footer-wgp-col-title">Informasi</div>
        <ul>
          <li><a href="/jadwal">Jadwal Pertandingan</a></li>
          <li><a href="/hasil-dan-klasemen">Hasil & Klasemen</a></li>
          <li><a href="/pembalap_dan_tim">Pembalap & Legenda</a></li>
          <li><a href="/videos">Video</a></li>
          <li><a href="/berita">Berita</a></li>
        </ul>
      </div>
      <div class="footer-wgp-col">
        <div class="footer-wgp-col-title">SITEMAP</div>
        <ul>
          <li><a href="https://winnicode.com/">Beranda</a></li>
          <li><a href="https://winnicode.com/explore/berita">Berita</a></li>
          <li><a href="https://winnicode.com/kontak-kami">Kontak Kami</a></li>
          <li><a href="https://winnicode.com/privasi-policy">Privasi & Policy</a></li>
          <li><a href="https://winnicode.com/tentang">Tentang</a></li>
        </ul>
      </div>
      <div class="footer-wgp-col">
      <div class="footer-wgp-col-title">Bagikan</div>
        <div class="footer-wgp-sosmed">
          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" rel="noopener" title="Bagikan ke Facebook">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="https://api.whatsapp.com/send?text={{ urlencode('Cek websitenya: '.url('/').' - dari '.(Auth::check() ? Auth::user()->name : 'anonim')) }}" target="_blank">
              <i class="bi bi-whatsapp"></i>
          </a>
          <a href="https://twitter.com/intent/tweet?text={{ urlencode('Cek website ini! - dari Mawan') }}&url={{ url('/') }}" target="_blank">
            <i class="bi bi-twitter-x"></i>
          </a>
        </div>
    </div>
  </footer>

{{-- === BOOTSTRAP ICONS CDN === --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

{{-- === SIDEBAR JS === --}}
<script>
  const sidebar = document.getElementById('sidebarMenu');
  const openBtn = document.getElementById('openSidebarBtn');
  const closeBtn = document.getElementById('closeSidebarBtn');
  const overlay = document.getElementById('sidebarOverlay');
  openBtn.onclick = function() {
    sidebar.style.left = '0'; overlay.style.display = 'block'; document.body.style.overflow = 'hidden';
  };
  closeBtn.onclick = overlay.onclick = function() {
    sidebar.style.left = '-320px'; overlay.style.display = 'none'; document.body.style.overflow = '';
  };
  window.addEventListener('keydown', function(e){
    if(e.key==='Escape') { sidebar.style.left = '-320px'; overlay.style.display = 'none'; document.body.style.overflow = ''; }
  });
</script>

@endsection
