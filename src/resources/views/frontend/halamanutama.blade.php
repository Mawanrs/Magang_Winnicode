@extends('layouts.app')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #101010; border-bottom:5px solid #d9002b;">
  <div class="container">
    <a class="navbar-brand" href="/">WinniGP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/jadwal">Jadwal & Klasemen</a></li>
        <li class="nav-item"><a class="nav-link" href="/pembalap">Pembalap & Tim</a></li>
        <li class="nav-item"><a class="nav-link" href="/berita">Berita</a></li>
      </ul>
      <ul class="navbar-nav ms-auto align-items-center">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}">Register</a>
            </li>
        @else
        <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   style="color: #aaf3ff; font-weight: 500;">Keluar</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <li class="nav-item d-flex align-items-center">
                <a href="{{ url('/profile') }}" class="nav-link fw-bold" style="color: #fff;">
                    Selamat Datang
                </a>
                <img src="{{ asset('storage/e3974b7d-e882-43a1-b5c8-2da6e5e64349.png') }}" alt="helm" style="width:28px; height:28px; margin-left:10px;">
            </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<!-- Sidebar -->
<!-- Hamburger Icon (sidebar trigger) -->
<button id="openSidebarBtn" class="btn btn-link" style="font-size:2rem; position:fixed; top:20px; left:20px; z-index:1100;">
  <i class="bi bi-list"></i>
</button>

<!-- Sidebar Overlay -->
<div id="sidebarOverlay" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.08); z-index:1099;"></div>

<!-- Sidebar Menu -->
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
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">VideoPass</a></li>
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">Video</a></li>
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">Berita</a></li>
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">Fans <span style="float:right;">&#8250;</span></a></li>
    <li class="mb-3"><a href="#" class="text-dark text-decoration-none">Balap Lainnya <span style="float:right;">&#8250;</span></a></li>
  </ul>
  <div class="ps-4 pe-4 mt-4">
    <a href="#" class="d-flex align-items-center mb-3" style="color:#111;font-weight:600;font-size:.97em;">
      <i class="bi bi-question-circle me-2"></i>PUSAT BANTUAN
    </a>
    <button class="btn btn-light border rounded-pill w-100 d-flex align-items-center justify-content-between">
      <span><i class="bi bi-globe2 me-2"></i>INDONESIAN</span>
      <i class="bi bi-chevron-down ms-2"></i>
    </button>
  </div>
</aside>
<!-- End Sidebar -->

<!-- Hero Section / Headline -->
@if($headline)
  <div class="container-fluid p-0 hero-section mb-4 position-relative" style="background:#000;">
    <img src="{{ asset('storage/'.$headline->image) }}" alt="{{ $headline->title }}" class="w-100" style="object-fit:cover;height:330px; border-radius: 0 0 16px 16px; filter: brightness(.88);">
    <div class="position-absolute" style="bottom:32px; left:32px; color:#fff; text-shadow:2px 2px 8px #000a; max-width:70%;">
      <h2 style="font-size:2.2rem; font-weight:bold; text-transform:uppercase;">{{ $headline->title }}</h2>
      <p class="lead">{{ \Illuminate\Support\Str::limit(strip_tags($headline->content), 150) }}</p>
      <a href="{{ url('/berita/'.$headline->slug) }}" class="btn btn-danger btn-lg">Baca Sekarang</a>
      <div class="d-flex mt-3">
        @if(isset($headline_thumbs) && count($headline_thumbs) > 0)
            @foreach($headline_thumbs as $thumb)
                <img src="{{ asset('storage/'.$thumb->image) }}" alt="thumb" style="height:60px; width:90px;object-fit:cover; border-radius:8px; margin-right:7px; border:2px solid #fff;">
            @endforeach
        @endif
      </div>
    </div>
  </div>
@endif

<div class="container">

  <!-- Section Klasemen -->
  <div class="d-flex justify-content-between align-items-center mb-1">
    <div class="fw-bold" style="font-size:1.3rem;">2025 Michelin™ Grand Prix of France</div>
    <a href="/jadwal" class="text-danger fw-semibold" style="text-decoration:none;">Lihat Jadwal & Klasemen &rarr;</a>
  </div>
  <div class="table-responsive mb-4">
    <table class="table" style="text-align:center;">
      <thead style="background:#222; color:#fff;">
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
          <tr @if($k==0) style="background:#ffd9d9" @elseif($k==1) style="background:#fff7d9" @elseif($k==2) style="background:#d9ffd9" @endif>
            <td>{{ $row->position }}</td>
            <td>{{ $row->pembalap }}</td>
            <td>{{ $row->poin }}</td>
            <td>{{ $row->selisih }}</td>
          </tr>
          @endforeach
        @else
          <!-- Dummy example -->
          <tr style="background:#ffd9d9"><td>1</td><td>Marc Marquez</td><td>171</td><td></td></tr>
          <tr style="background:#fff7d9"><td>2</td><td>Bagnaia</td><td>149</td><td>-22</td></tr>
          <tr style="background:#d9ffd9"><td>3</td><td>J. Zarco</td><td>120</td><td>-51</td></tr>
        @endif
      </tbody>
    </table>
  </div>

  <!-- Highlight News/Event Card -->
  <div class="row mb-4">
    <div class="col-md-8">
      <div class="fw-bold mb-2">Momen Terbaik Michelin™ GP Prancis 2025</div>
      <div style="color:#222; font-size:1.11em; margin-bottom:18px;">
        Saksikan aksi Johann Zarco yang dramatis dan penuh kejutan di GP Prancis 2025. Lihat cuplikan terbaik dan sorotan menarik yang tak terlupakan!
      </div>
      <a href="#" class="btn btn-danger">Baca Selengkapnya</a>
    </div>
    <div class="col-md-4">
      <img src="{{ asset('storage/highlight-momen.jpg') }}" alt="Highlight Momen" style="width:100%; border-radius:12px; object-fit:cover;">
    </div>
  </div>

  <!-- Video Terbaru Section -->
  <div class="d-flex justify-content-between align-items-center mb-2">
    <div class="fw-bold" style="font-size:1.2rem;">Video Terbaru</div>
    <a href="/videos" class="fw-semibold text-danger" style="text-decoration:none;">Lebih Banyak &rarr;</a>
  </div>
  <div class="row flex-nowrap overflow-auto mb-4 pb-2" style="gap:16px;">
    @if(!empty($videos))
      @foreach($videos as $vid)
      <div class="card" style="min-width:290px; max-width:320px; display:inline-block;">
        <img src="{{ asset('storage/'.$vid->thumbnail) }}" class="card-img-top" alt="Video">
        <div class="card-body">
          <h6 class="card-title">{{ $vid->title }}</h6>
          <p class="card-text">{{ $vid->description }}</p>
        </div>
      </div>
      @endforeach
    @else
      <div class="card" style="min-width:290px; max-width:320px; display:inline-block;">
        <img src="{{ asset('storage/video1.jpg') }}" class="card-img-top" alt="Video">
        <div class="card-body">
          <h6 class="card-title">Replay: GP Prancis 2025</h6>
          <p class="card-text">Cuplikan balapan penuh drama di Le Mans.</p>
        </div>
      </div>
    @endif
  </div>

  <!-- Berita Terbaru Section -->
  <div class="d-flex justify-content-between align-items-center mb-2">
    <div class="fw-bold" style="font-size:1.2rem;">Berita Terbaru</div>
    <a href="/berita" class="fw-semibold text-danger" style="text-decoration:none;">Lebih Banyak &rarr;</a>
  </div>
  <div class="row flex-nowrap overflow-auto mb-4 pb-2" style="gap:16px;">
    @if(!empty($news))
      @foreach($news as $item)
      <div class="card" style="min-width:290px; max-width:320px; display:inline-block;">
        <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}">
        <div class="card-body">
          <h6 class="card-title">{{ $item->title }}</h6>
          <p class="card-text">{{ Str::limit(strip_tags($item->content), 80) }}</p>
        </div>
      </div>
      @endforeach
    @else
      <div class="card" style="min-width:290px; max-width:320px; display:inline-block;">
        <img src="{{ asset('storage/berita1.jpg') }}" class="card-img-top" alt="Berita">
        <div class="card-body">
          <h6 class="card-title">MotoGP Prancis Kacau!</h6>
          <p class="card-text">Banyak insiden menegangkan sepanjang balapan.</p>
        </div>
      </div>
    @endif
  </div>
</div>

<!-- Footer -->
<footer class="footer-custom mt-4" style="background:#fff; border-top:2px solid #eee; padding:24px 0; color:#222;">
  <div class="container">
    <div class="row">
      <div class="col-md-3 mb-3">
        <img src="{{ asset('storage/logo-winnicode.png') }}" alt="Logo Winni Code" style="height:42px;"><br>
        <span class="fw-bold" style="font-size:1.17em;">WinniGP</span>
      </div>
      <div class="col-md-5 mb-3">
        <a href="#" style="color:#666; margin-right:12px; text-decoration:none;">Tentang</a>
        <a href="#" style="color:#666; margin-right:12px; text-decoration:none;">Kontak</a>
        <a href="#" style="color:#666; margin-right:12px; text-decoration:none;">Privasi</a>
        <a href="#" style="color:#666; text-decoration:none;">Sitemap</a>
      </div>
      <div class="col-md-4 mb-3">
        <span class="fw-bold">Ikuti Kami:</span>
        <span style="font-size:1.23em; margin-left:12px;">
          <i class="bi bi-facebook"></i>
          <i class="bi bi-twitter"></i>
          <i class="bi bi-youtube"></i>
        </span>
      </div>
    </div>
    <div class="text-center mt-3" style="color:#aaa; font-size:0.96em;">© 2025 WinniGP. All rights reserved.</div>
  </div>
</footer>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@endsection
