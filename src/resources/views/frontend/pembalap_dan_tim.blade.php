@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/pembalapdanlegenda.css') }}">

{{-- ==== HEADER ==== --}}
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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Masuk</a></li>
                    <li class="nav-item"><span class="winni-auth-divider">|</span></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Daftar</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ url('/profile') }}">Hai, {{ Auth::user()->name }}</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"

                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

{{-- ==== SIDEBAR ==== --}}
<div id="sidebarOverlay" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.08); z-index:1099;"></div>
<aside id="sidebarMenu" style="position:fixed; top:0; left:-320px; width:320px; height:100vh; background:#fff; z-index:1200; transition: left .28s cubic-bezier(.9,0,.42,1.13); box-shadow:2px 0 16px #2222;">
  <div class="p-4 pb-1 d-flex align-items-center">
    <button id="closeSidebarBtn" class="btn btn-link p-0 me-3" style="font-size:2rem;">&times;</button>
    <img src="{{ asset('storage/banner-logo (1).png') }}" alt="MotoGP" style="height:40px;">
  </div>
  <ul class="list-unstyled ps-4 pe-4 mb-3" style="font-size:1.17em;">
    <li class="mb-3"><a href="/jadwal" class="text-dark text-decoration-none">Kalender</a></li>
    <li class="mb-3"><a href="/hasil_dan_klasemen" class="text-dark text-decoration-none">Hasil & Klasemen</a></li>
    <li class="mb-3"><a href="/pembalap_dan_tim" class="text-dark text-decoration-none">Pembalap & Legenda</a></li>
    <li class="mb-3"><a href="/videos" class="text-dark text-decoration-none">Video</a></li>
    <li class="mb-3"><a href="/berita" class="text-dark text-decoration-none">Berita</a></li>
  </ul>
</aside>

{{-- ==== CONTENT ==== --}}
<div class="main-wrapper">
    <div class="header-section">
        <div class="container">
            <h1 class="section-title">Pembalap & Legenda</h1>
        </div>
    </div>

    {{-- Tab Kategori --}}
    <div class="nav-section">
        <div class="container">
            <ul class="nav nav-tabs nav-tabs-custom mb-3" id="mainRiderTeamTab" role="tablist">
                <li class="nav-item"><button class="nav-link active" id="pembalap-tab" data-bs-toggle="tab" data-bs-target="#pembalap" type="button">Pembalap</button></li>
                <li class="nav-item"><button class="nav-link" id="legenda-tab" data-bs-toggle="tab" data-bs-target="#legenda" type="button">Legenda</button></li>
            </ul>
        </div>
    </div>

    {{-- Konten --}}
    <div class="container">
        <div class="tab-content" id="mainRiderTeamTabContent">
            @php
                $kategoriList = ['Pembalap', 'Legenda'];
            @endphp

            @foreach ($kategoriList as $kategori)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ strtolower($kategori) }}" role="tabpanel">
                <h3 class="mb-3">{{ $kategori }}</h3>
                <div class="row">
                    @forelse($pembalap->where('kategori', $kategori) as $rider)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="card-custom text-center p-3">
                            {{-- Rider Number --}}
                            <div class="position-relative">
                                <div class="rider-number">#{{ $rider->rider_number }}</div>
                            </div>

                            {{-- Rider Image --}}
                            <div class="rider-image-wrapper my-2">
                                <img src="{{ $rider->avatar_url ? asset('storage/' . $rider->avatar_url) : 'https://www.gravatar.com/avatar/?d=mp' }}"
                                     class="img-fluid rounded-circle" alt="{{ $rider->rider_name }}" style="width: 100px;">
                            </div>

                            {{-- Rider Name --}}
                            <div class="fw-semibold">{{ $rider->rider_name }}</div>
                            <div class="text-secondary small">{{ $rider->team }}</div>

                            {{-- Flag --}}
                            @if($rider->flag_image)
                                <img src="{{ asset('storage/' . $rider->flag_image) }}" alt="Bendera" class="mt-2" style="height: 20px;">
                            @endif

                            {{-- Kelas --}}
                            <div class="mt-2 badge bg-primary">{{ $rider->kelas }}</div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-muted">Belum ada data {{ strtolower($kategori) }}.</p>
                    </div>
                    @endforelse
                </div>
            </div>
            @endforeach
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