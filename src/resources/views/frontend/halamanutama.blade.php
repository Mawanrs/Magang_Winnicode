@push('styles')
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush

@section('body-class', 'body-homepage')
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
            <a class="nav-link">Selamat Datang, {{ Auth::user()->name }}</a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

{{-- ==== INFOBAR ==== --}}
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
    <div class="winnicode-minicards-row d-flex justify-content-center flex-wrap">
      @foreach($news as $n)
      <a href="{{ url('/berita/'.$n->slug) }}" class="position-relative rounded overflow-hidden shadow-sm m-2" style="width: 300px; background-color: #2d2d2d; text-decoration: none;">

          {{-- Gambar --}}
          <div class="position-relative">
            <img src="{{ asset('storage/'.$n->image) }}" alt="thumb" class="w-100" style="height: 180px; object-fit: cover;">

            {{-- Label Jenis Konten --}}
            <div class="position-absolute top-0 start-0 m-2 px-2 py-1 rounded bg-dark text-white d-flex align-items-center" style="font-size: 12px;">
              <i class="fas fa-newspaper me-1"></i> Berita
            </div>
          </div>

          {{-- Konten bawah (judul dan tanggal) --}}
          <div class="p-3 text-white">
            {{-- Judul --}}
            <div class="fw-bold" style="font-size: 14px; line-height: 1.3;">
              {{ $n->title }}
            </div>
            {{-- Tanggal --}}
            <div class="text-muted mt-2" style="font-size: 13px;">
              {{ \Carbon\Carbon::parse($n->created_at)->translatedFormat('d F Y') }}
            </div>
          </div>
        </a>
        @endforeach

        @foreach($videos as $v)
        <a href="{{ url('/videos/'.$v->slug) }}" class="position-relative rounded overflow-hidden shadow-sm m-2" style="width: 300px; background-color: #2d2d2d; text-decoration: none;">
            {{-- Gambar Thumbnail --}}
            <div class="position-relative">
              <img src="{{ asset('storage/'.$v->thumbnail) }}" alt="thumb" class="w-100" style="height: 180px; object-fit: cover;">
              {{-- Label Jenis Konten --}}
              <div class="position-absolute top-0 start-0 m-2 px-2 py-1 rounded bg-dark text-white d-flex align-items-center" style="font-size: 12px;">
                <i class="fas fa-play me-1"></i> {{ $v->duration }}
              </div>
            </div>
            {{-- Konten bawah (judul dan tanggal) --}}
            <div class="p-3 text-white">
              <div class="fw-bold" style="font-size: 14px; line-height: 1.3;">
                {{ $v->title }}
              </div>
              <div class="text-muted mt-2" style="font-size: 13px;">
                {{ \Carbon\Carbon::parse($v->created_at)->translatedFormat('d F Y') }}
              </div>
            </div>
        </a>
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

{{-- KLASIMEN SECTION --}}
<div class="container">
  <div class="klasemen-section">
    <div class="klasemen-header d-flex justify-content-between align-items-start">
      <h2 class="klasemen-title">2025 Michelin<sup>®</sup> Grand Prix of France</h2>
      <a href="{{ route('hasil_dan_klasemen') }}" class="klasemen-link">
        Klasemen Lengkap
        <svg width="29" height="25" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23 2L30 11L23 20" stroke="#111" stroke-width="2.7"/>
            <line x1="30" y1="11" x2="2" y2="11" stroke="#111" stroke-width="2.7"/>
        </svg>
      </a>
    </div>
    <div class="klasemen-tabs d-flex" id="klasemen-tabs">
      <div class="klasemen-tab active" data-target="motogp">MOTOGP™</div>
      <div class="klasemen-tab" data-target="moto2">MOTO2™</div>
      <div class="klasemen-tab" data-target="moto3">MOTO3™</div>
      <div class="klasemen-tab" data-target="motoe">MOTOE™</div>
    </div>
    <div class="klasemen-tab-content">
      {{-- MOTOGP --}}
      <div class="klasemen-table-wrapper tab-panel active" id="motogp">
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
            @foreach($klasemen_motogp as $k => $row)
              <tr class="{{ $k==0 ? 'top-klasemen' : '' }}">
                <td>{{ $row->position }}</td>
                <td class="klasemen-nama">{{ $row->rider_name }}</td>
                <td>
                  @if($row->country_code)
                    <img src="https://flagcdn.com/24x18/{{ strtolower($row->country_code) }}.png" alt="{{ $row->country_code }}" width="24" height="18" style="margin-right:6px;">
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
      {{-- MOTO2 --}}
      <div class="klasemen-table-wrapper tab-panel" id="moto2">
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
            @foreach($klasemen_moto2 as $k => $row)
              <tr class="{{ $k==0 ? 'top-klasemen' : '' }}">
                <td>{{ $row->position }}</td>
                <td class="klasemen-nama">{{ $row->rider_name }}</td>
                <td>
                  @if($row->country_code)
                    <img src="https://flagcdn.com/24x18/{{ strtolower($row->country_code) }}.png" alt="{{ $row->country_code }}" width="24" height="18" style="margin-right:6px;">
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
      {{-- MOTO3 --}}
      <div class="klasemen-table-wrapper tab-panel" id="moto3">
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
            @foreach($klasemen_moto3 as $k => $row)
              <tr class="{{ $k==0 ? 'top-klasemen' : '' }}">
                <td>{{ $row->position }}</td>
                <td class="klasemen-nama">{{ $row->rider_name }}</td>
                <td>
                  @if($row->country_code)
                    <img src="https://flagcdn.com/24x18/{{ strtolower($row->country_code) }}.png" alt="{{ $row->country_code }}" width="24" height="18" style="margin-right:6px;">
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
      {{-- MOTOE --}}
      <div class="klasemen-table-wrapper tab-panel" id="motoe">
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
            @foreach($klasemen_motoe as $k => $row)
              <tr class="{{ $k==0 ? 'top-klasemen' : '' }}">
                <td>{{ $row->position }}</td>
                <td class="klasemen-nama">{{ $row->rider_name }}</td>
                <td>
                  @if($row->country_code)
                    <img src="https://flagcdn.com/24x18/{{ strtolower($row->country_code) }}.png" alt="{{ $row->country_code }}" width="24" height="18" style="margin-right:6px;">
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
</div>

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
    @foreach($news as $item)
    <div class="video-card">
        <div class="video-thumb-wrap">
            <img src="{{ asset('storage/'.$item->image) }}" alt="Berita" class="video-thumb">
            <span class="video-duration"><i class="bi bi-newspaper"></i>Berita</span>
            <div class="video-overlay"></div>
        </div>
        <div class="video-info">
            <div class="video-title">{{ $item->title }}</div>
            <div class="video-desc">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 70) }}</div>
            <div class="video-date">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</div>
        </div>
    </div>
    @endforeach
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

{{-- === CUSTOM JS UNTUK TAB KLASIMEN === --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.klasemen-tab').forEach(function(tab) {
        tab.addEventListener('click', function() {
            // Remove active dari semua tab
            document.querySelectorAll('.klasemen-tab').forEach(t => t.classList.remove('active'));
            // Hide semua panel
            document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
            // Activate yang diklik
            this.classList.add('active');
            document.getElementById(this.getAttribute('data-target')).classList.add('active');
        });
    });
});
</script>

@endsection
