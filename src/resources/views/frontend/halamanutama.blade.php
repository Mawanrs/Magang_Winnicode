@extends('layouts.app')

@section('content')
{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #101010; border-bottom:5px solid #d9002b; padding:0.4rem 0;">
  <div class="container">
    <!-- Sidebar Button -->
    <button id="openSidebarBtn" class="btn btn-link p-0 me-2" type="button" style="font-size:2.1rem;">
      <i class="bi bi-list" style="color:#2196f3;"></i>
    </button>
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center me-3" href="/" style="font-size:1.5rem;">
      <img src="{{ asset('storage/logo-winnicode.png') }}" alt="Logo WinniGP" style="height:38px; margin-right:8px;">
      <span style="font-weight:900; letter-spacing:1px;">WinniGP</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold" style="font-size:1.17em;">
        <li class="nav-item"><a class="nav-link px-3" href="/jadwal">Jadwal</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/hasil-dan-klasemen">Hasil & Klasemen</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/pembalap_dan_tim">Pembalap & Tim</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="/berita">Berita</a></li>
      </ul>
      <ul class="navbar-nav ms-auto align-items-center fw-bold" style="font-size:1.09em;">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}">Masuk</a>
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

{{-- SIDEBAR OVERLAY + MENU (COPY PASTE PUNYAMU, TIDAK DIUBAH) --}}
<div id="sidebarOverlay" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.08); z-index:1099;"></div>
<aside id="sidebarMenu" style="position:fixed; top:0; left:-320px; width:320px; height:100vh; background:#fff; z-index:1200; transition: left .28s cubic-bezier(.9,0,.42,1.13); box-shadow:2px 0 16px #2222;">
  <div class="p-4 pb-1 d-flex align-items-center">
    <button id="closeSidebarBtn" class="btn btn-link p-0 me-3" style="font-size:2rem;">&times;</button>
    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5d/Moto_Gp_logo.svg" alt="MotoGP" style="height:40px;">
  </div>
  <ul class="list-unstyled ps-4 pe-4 mb-3" style="font-size:1.17em;">
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">Kalender</a></li>
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">Hasil</a></li>
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">Klasemen</a></li>
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">Pembalap & Tim</a></li>
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">Berita</a></li>
  </ul>
</aside>

{{-- HERO / HEADLINE (PERSIS PDF: gambar besar, text besar, button) --}}
@if($headline)
<div class="container-fluid p-0 position-relative" style="background:#222;min-height:320px;">
  <img src="{{ asset('storage/'.$headline->image) }}" alt="{{ $headline->title }}" class="w-100" style="object-fit:cover;height:370px;filter:brightness(.78);">
  <div class="position-absolute" style="top:38%;left:60px;color:#fff;text-shadow:2px 2px 12px #111c;max-width:44%;">
    <div style="font-size:2.8rem;line-height:1.1;font-weight:900;text-transform:uppercase;">{{ $headline->title }}</div>
    <div style="font-size:1.23rem;margin-bottom:15px;font-weight:500;">
      {{ \Illuminate\Support\Str::limit(strip_tags($headline->content), 170) }}
    </div>
    <a href="{{ url('/berita/'.$headline->slug) }}" class="btn" style="background:#d9002b;color:#fff;font-size:1.08em;border-radius:8px;padding:10px 30px;">BACA SEKARANG</a>
  </div>
</div>
@endif

{{-- SECTION KELASMEN & JADWAL --}}
<div class="container mt-4">
  <div class="row align-items-end mb-2">
    <div class="col-md-7 fw-bold" style="font-size:1.5rem;">2025 Michelin™ Grand Prix of France</div>
    <div class="col-md-5 text-end">
      <a href="/hasil-dan-klasemen" class="btn btn-outline-danger fw-bold" style="border-width:2px;">Lihat Klasemen &rarr;</a>
    </div>
  </div>
  <div class="table-responsive mb-5">
    <table class="table table-bordered" style="background:#fff;box-shadow:0 2px 14px #0001;text-align:center;">
      <thead style="background:#222;color:#fff;">
        <tr>
          <th>Pos</th>
          <th>Pembalap</th>
          <th>Poin</th>
          <th>Gap</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($klasemen) && count($klasemen)>0)
          @foreach($klasemen as $k => $row)
          <tr @if($k==0) style="background:#ffeaea" @elseif($k==1) style="background:#fffbd9" @elseif($k==2) style="background:#d9ffd9" @endif>
            <td class="fw-bold">{{ $row->position }}</td>
            <td class="fw-bold">{{ $row->pembalap }}</td>
            <td>{{ $row->poin }}</td>
            <td>{{ $row->selisih ?? '-' }}</td>
          </tr>
          @endforeach
        @else
          <tr style="background:#ffeaea"><td>1</td><td>Marc Marquez</td><td>171</td><td></td></tr>
          <tr style="background:#fffbd9"><td>2</td><td>Bagnaia</td><td>149</td><td>-22</td></tr>
          <tr style="background:#d9ffd9"><td>3</td><td>J. Zarco</td><td>120</td><td>-51</td></tr>
        @endif
      </tbody>
    </table>
  </div>

  {{-- HIGHLIGHT SECTION (PDF: gambar kanan besar, judul dan tombol kiri) --}}
  <div class="row mb-5 align-items-center">
    <div class="col-md-8">
      <div class="fw-bold" style="font-size:1.31rem;letter-spacing:.5px;">Momen Terbaik MotoGP™ | GP Prancis 2025</div>
      <div style="font-size:1.08em;margin-bottom:18px;">
        Saksikan aksi dramatis dan kejutan di GP Prancis 2025. <br>
        Lihat cuplikan terbaik dan sorotan menarik yang tak terlupakan!
      </div>
      <a href="#" class="btn" style="background:#d9002b;color:#fff;font-size:1.03em;border-radius:8px;padding:7px 28px;">Baca Sekarang</a>
    </div>
    <div class="col-md-4">
      <img src="{{ asset('storage/highlight-momen.jpg') }}" alt="Highlight Momen" style="width:100%;border-radius:15px;object-fit:cover;">
    </div>
  </div>

  {{-- VIDEO TERBARU --}}
  <div class="d-flex justify-content-between align-items-center mb-2">
    <div class="fw-bold" style="font-size:1.25rem;">Video Terbaru</div>
    <a href="/videos" class="fw-semibold text-danger" style="font-size:1em;">Lebih Banyak &rarr;</a>
  </div>
  <div class="row flex-nowrap overflow-auto mb-4 pb-2" style="gap:18px;">
    @if(!empty($videos))
      @foreach($videos as $vid)
      <div class="card" style="min-width:280px;max-width:310px;">
        <img src="{{ asset('storage/'.$vid->thumbnail) }}" class="card-img-top" alt="Video">
        <div class="card-body">
          <h6 class="card-title mb-1 fw-bold" style="font-size:1.08em;">{{ $vid->title }}</h6>
          <span class="text-muted" style="font-size:.96em;">{{ $vid->duration ?? '' }}</span>
        </div>
      </div>
      @endforeach
    @else
      <div class="card" style="min-width:280px;max-width:310px;">
        <img src="{{ asset('storage/video1.jpg') }}" class="card-img-top" alt="Video">
        <div class="card-body">
          <h6 class="card-title mb-1 fw-bold">Replay: GP Prancis 2025</h6>
          <span class="text-muted">01:23:00</span>
        </div>
      </div>
    @endif
  </div>

  {{-- BERITA TERBARU --}}
  <div class="d-flex justify-content-between align-items-center mb-2">
    <div class="fw-bold" style="font-size:1.23rem;">Berita Terbaru</div>
    <a href="/berita" class="fw-semibold text-danger" style="font-size:1em;">Lebih Banyak &rarr;</a>
  </div>
  <div class="row flex-nowrap overflow-auto mb-4 pb-2" style="gap:18px;">
    @if(!empty($news))
      @foreach($news as $item)
      <div class="card" style="min-width:280px;max-width:310px;">
        <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}">
        <div class="card-body">
          <h6 class="card-title fw-bold" style="font-size:1.08em;">{{ $item->title }}</h6>
          <div class="text-muted" style="font-size:0.97em;">{{ Str::limit(strip_tags($item->content), 80) }}</div>
        </div>
      </div>
      @endforeach
    @else
      <div class="card" style="min-width:280px;max-width:310px;">
        <img src="{{ asset('storage/berita1.jpg') }}" class="card-img-top" alt="Berita">
        <div class="card-body">
          <h6 class="card-title fw-bold">MotoGP Prancis Kacau!</h6>
          <div class="text-muted">Banyak insiden menegangkan sepanjang balapan.</div>
        </div>
      </div>
    @endif
  </div>
</div>

{{-- FOOTER PDF STYLE --}}
<footer class="mt-4" style="background:#fff; border-top:2px solid #eee; padding:30px 0;">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mb-3">
        <img src="{{ asset('storage/logo-winnicode.png') }}" alt="Logo WinniGP" style="height:38px;">
        <span class="fw-bold ms-2" style="font-size:1.13em;">WinniGP</span>
      </div>
      <div class="col-md-6 mb-3">
        <a href="#" class="me-3 text-secondary">Tentang</a>
        <a href="#" class="me-3 text-secondary">Berita</a>
        <a href="#" class="me-3 text-secondary">Kontak Kami</a>
        <a href="#" class="me-3 text-secondary">Privasi & Policy</a>
        <a href="#" class="text-secondary">Sitemap</a>
      </div>
      <div class="col-md-3 mb-3">
        <span class="fw-bold">Ikuti Kami:</span>
        <span style="font-size:1.22em; margin-left:10px;">
          <i class="bi bi-facebook"></i>
          <i class="bi bi-twitter"></i>
          <i class="bi bi-youtube"></i>
        </span>
      </div>
    </div>
    <div class="text-center mt-2" style="color:#aaa; font-size:0.95em;">© 2025 WinniGP. All rights reserved.</div>
  </div>
</footer>

{{-- BOOTSTRAP ICONS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

{{-- Sidebar JS, sama persis punyamu --}}
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
