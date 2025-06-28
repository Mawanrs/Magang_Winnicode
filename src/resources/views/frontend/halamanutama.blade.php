@extends('layouts.app')

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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold winni-navbar-menu">
        <li class="nav-item"><a class="nav-link px-3" href="/jadwal">Jadwal Pertandingan</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/hasil-dan-klasemen">Hasil & Klasmen</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/pembalap_dan_tim">Pembalap & Tim</a></li>
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
            <a class="nav-link" href="{{ url('/profile') }}">Hai, {{ Auth::user()->name }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               style="color: #eee8e8; font-weight: 600;">Keluar</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

<div class="winnicode-infobar d-flex align-items-center">
    <div class="winni-infobar-flag d-flex align-items-center">
        <img src="https://flagcdn.com/es.svg" alt="Spain" width="28" height="20">
        <span class="ms-2">Spain Moto3 Test</span>
        <i class="bi bi-chevron-right ms-2"></i>
    </div>
    <div class="winnicode-infobar-session flex-grow-1 text-center">
        MOTO3<sup>™</sup> SESSION 2
    </div>
</div>

{{-- ==== HERO / HEADLINE ==== --}}
@if($headline)
<div class="container-fluid p-0 position-relative winnicode-hero">
  <img src="{{ asset('storage/'.$headline->image) }}" alt="{{ $headline->title }}" class="w-100 winni-hero-img">
  <div class="winnicode-hero-text">
    <div class="winnicode-hero-label">MOTOGP™</div>
    <div class="winnicode-hero-title">{{ $headline->title }}</div>
    <a href="{{ url('/berita/'.$headline->slug) }}" class="winnicode-hero-btn">BACA SEKARANG</a>
  </div>
  <div class="winnicode-minicards-container">
    <div class="winnicode-minicards-row d-flex justify-content-center">
      {{-- Loop data real kamu di sini --}}
      @foreach($news as $n)
        <div class="winnicode-minicard">
          <img src="{{ asset('storage/'.$n->image) }}" alt="thumb">
          <div>
              <div class="winnicode-minicard-title">{{ $n->title }}</div>
              <div class="winnicode-minicard-time">{{ $n->created_at->diffForHumans() }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endif

{{-- SIDEBAR OVERLAY + MENU--}}
<div id="sidebarOverlay" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.08); z-index:1099;"></div>
<aside id="sidebarMenu" style="position:fixed; top:0; left:-320px; width:320px; height:100vh; background:#fff; z-index:1200; transition: left .28s cubic-bezier(.9,0,.42,1.13); box-shadow:2px 0 16px #2222;">
  <div class="p-4 pb-1 d-flex align-items-center">
    <button id="closeSidebarBtn" class="btn btn-link p-0 me-3" style="font-size:2rem;">&times;</button>
    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/Moto_Gp_logo.svg" alt="MotoGP" style="height:40px;">
  </div>
  <ul class="list-unstyled ps-4 pe-4 mb-3" style="font-size:1.17em;">
    <li class="mb-3"><a href="/jadwal" class="text-dark text-decoration-none">Kalender</a></li>
    <li class="mb-3"><a href="/hasil_dan_klasemen" class="text-dark text-decoration-none">Hasil & Klasemen</a></li>
    <li class="mb-3"><a href="/pembalap_dan_tim" class="text-dark text-decoration-none">Pembalap & Tim</a></li>
    <li class="mb-3"><a href="/berita" class="text-dark text-decoration-none">Berita</a></li>
  </ul>
</aside>

{{-- SECTION Klasemen & Jadwal --}}
  <div class="container">
  <div class="klasemen-section">
    <div class="klasemen-header d-flex justify-content-between align-items-center">
      <h2 class="klasemen-title">2025 Michelin<sup>®</sup> Grand Prix of France</h2>
      <a href="{{ route('hasil_dan_klasemen') }}" class="klasemen-link">
        Klasemen Lengkap
        <svg ...></svg>
      </a>
    </div>
    <div class="klasemen-tabs d-flex">
      <div class="klasemen-tab active">MOTOGP™</div>
      <div class="klasemen-tab">MOTO2™</div>
      <div class="klasemen-tab">MOTO3™</div>
      <div class="klasemen-tab">MOTOE™</div>
    </div>
    <div class="klasemen-table-wrapper">
      <table class="klasemen-table">
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
          @foreach($klasemen as $k => $row)
            <tr class="{{ $k==0 ? 'top-klasemen' : '' }}">
              <td>{{ $row->position }}</td>
              <td class="klasemen-nama">{{ $row->rider_name }}</td>
              <td>
                @if($row->country_code)
                  <img src="https://flagcdn.com/24x18/{{ strtolower($row->country_code) }}.png" alt="{{ $row->country_code }}" width="24" height="18" style="margin-right:4px;">
                @endif
                {{ $row->team }}
              </td>
              <td class="klasemen-poin">{{ $row->points }}</td>
              <td class="klasemen-gap">{{ $row->gap_time }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- HIGHLIGHT SECTION --}}
<div class="container">
  <div class="highlight-section row align-items-center">
    <div class="col-md-6 highlight-left">
      <div class="highlight-title">
        Momen Terbaik MotoGP™ 🏆 | GP Prancis 2025
      </div>
      <div class="highlight-desc">
        Grand Prix tak terlupakan dengan drama dari awal hingga akhir, serta luapan emosional dalam wujud pemenang yang mengejutkan 🙌 Lihat momen-momen penting dari balapan gila di Le Mans 👀
      </div>
      <a href="#" class="highlight-btn">Baca Sekarang</a>
    </div>
    <div class="col-md-6 highlight-img-col">
      <img src="{{ asset('storage/Highlight.webp') }}" alt="Highlight Momen" class="highlight-img">
    </div>
  </div>
</div>

<div class="container">

  {{-- VIDEO TERBARU --}}
  <div class="section-header d-flex justify-content-between align-items-center mb-3 mt-5">
      <div class="section-title">Video Terbaru</div>
      <a href="/videos" class="section-more-link">
          Lebih Banyak
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none">
              <path d="M23 2L30 11L23 20" stroke="#000" stroke-width="2"/>
              <line x1="30" y1="11" x2="2" y2="11" stroke="#000" stroke-width="2"/>
          </svg>
      </a>
  </div>
  <div class="video-grid mb-5">
      @foreach($videos as $vid)
      <div class="video-card">
          <div class="video-thumb-wrap">
              <img src="{{ asset('storage/'.$vid->thumbnail) }}" alt="Video" class="video-thumb">
              <span class="video-duration"><i class="bi bi-play-fill"></i>{{ $vid->duration }}</span>
              <div class="video-overlay"></div>
          </div>
          <div class="video-info">
              <div class="video-title">{{ $vid->title }}</div>
              <div class="video-desc">{{ Str::limit(strip_tags($vid->desc), 70) }}</div>
              <div class="video-date">{{ \Carbon\Carbon::parse($vid->created_at)->translatedFormat('d F Y') }}</div>
          </div>
      </div>
      @endforeach
  </div>

  {{-- BERITA TERBARU --}}
  <div class="section-header d-flex justify-content-between align-items-center mb-3 mt-5">
      <div class="section-title">Berita Terbaru</div>
      <a href="/berita" class="section-more-link">
          Lebih Banyak
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none">
              <path d="M23 2L30 11L23 20" stroke="#000" stroke-width="2"/>
              <line x1="30" y1="11" x2="2" y2="11" stroke="#000" stroke-width="2"/>
          </svg>
      </a>
  </div>
  <div class="video-grid">
      @forelse($news as $item)
      <div class="video-card">
          <div class="video-thumb-wrap">
              <img src="{{ asset('storage/'.$item->image) }}" class="video-thumb" alt="{{ $item->title }}">
              <div class="video-overlay"></div>
          </div>
          <div class="video-info">
              <div class="video-title">{{ $item->title }}</div>
              <div class="video-desc">{{ \Illuminate\Support\Str::limit(strip_tags($item->content ?? ''), 70) }}</div>
              <div class="video-date">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</div>
          </div>
      </div>
      @empty
      <div class="video-card">
          <div class="video-thumb-wrap">
              <img src="{{ asset('storage/berita1.jpg') }}" class="video-thumb" alt="Berita">
              <div class="video-overlay"></div>
          </div>
          <div class="video-info">
              <div class="video-title">MotoGP Prancis Kacau!</div>
              <div class="video-desc">Banyak insiden menegangkan sepanjang balapan.</div>
              <div class="video-date">12 Mei 2025</div>
          </div>
      </div>
      @endforelse
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
        <li><a href="#">Jadwal Pertandingan</a></li>
        <li><a href="#">Hasil & Klasemen</a></li>
        <li><a href="#">Informasi Harga Tiket</a></li>
        <li><a href="#">Berita</a></li>
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
          <i class="bi bi-x"></i>
        </a>
      </div>
  </div>
</footer>

{{-- === BOOTSTRAP ICONS CDN === --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

{{-- === WINNICODE CSS (PASTIKAN DIPANGGIL DI HEAD atau bawah sebelum </body>) === --}}
<link rel="stylesheet" href="{{ asset('css/winnicode.css') }}">

{{-- === SIDEBAR JS (sama seperti sebelumnya) === --}}
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
