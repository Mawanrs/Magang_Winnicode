@extends('layouts.app')

@section('content')

<!-- Hero Section / Headline -->
@if($headline)
  <div class="jumbotron bg-light p-4 rounded mb-4">
    <div class="row align-items-center">
      <div class="col-md-7">
        <h1 class="display-5 fw-bold">{{ $headline->title }}</h1>
        <p class="lead">{{ \Illuminate\Support\Str::limit(strip_tags($headline->content), 150) }}</p>
        <a href="{{ url('/berita/'.$headline->slug) }}" class="btn btn-primary btn-lg">Baca Sekarang</a>
      </div>
      <div class="col-md-5">
        @if($headline->image)
          <img src="{{ asset('storage/'.$headline->image) }}" class="img-fluid rounded" alt="{{ $headline->title }}">
        @endif
      </div>
    </div>
  </div>
@endif
<!-- End Hero Section -->

<!-- Kategori Menu -->
<div class="row text-center mb-4">
  <div class="col"><a href="/jadwal" class="btn btn-outline-secondary w-100">Jadwal Pertandingan</a></div>
  <div class="col"><a href="/klasemen" class="btn btn-outline-secondary w-100">Hasil & Klasemen</a></div>
  <div class="col"><a href="/pembalap" class="btn btn-outline-secondary w-100">Pembalap & Tim</a></div>
  <div class="col"><a href="/tiket" class="btn btn-outline-secondary w-100">Info Harga Tiket</a></div>
  <div class="col"><a href="/berita" class="btn btn-outline-secondary w-100">Berita</a></div>
</div>

<!-- Jadwal Pertandingan Singkat -->
@if(!empty($schedules))
<div class="card mb-4">
  <div class="card-header fw-bold">Jadwal Pertandingan Terdekat</div>
  <ul class="list-group list-group-flush">
    @foreach($schedules as $jadwal)
    <li class="list-group-item d-flex justify-content-between">
      <span>{{ $jadwal['event_name'] }} ({{ $jadwal['country'] }})</span>
      <span>{{ \Carbon\Carbon::parse($jadwal['start_date'])->format('d M Y') }} - {{ \Carbon\Carbon::parse($jadwal['end_date'])->format('d M Y') }}</span>
    </li>
    @endforeach
  </ul>
</div>
@endif

<!-- Section Berita Terbaru -->
<h3 class="mb-3">Berita Terbaru</h3>
@if(!empty($news))
<div class="row">
  @foreach($news as $item)
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      @if($item->image)
      <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $item->title }}">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $item->title }}</h5>
        <p class="card-text">{{ Str::limit(strip_tags($item->content), 80) }}</p>
        <a href="{{ url('/berita'.$item->slug) }}" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endif
<a href="/berita" class="btn btn-outline-primary mb-4">Lihat Semua Berita</a>

<!-- Section Video Terbaru -->
@if(!empty($videos))
<h3 class="mb-3">Video Terbaru</h3>
<div class="row">
  @foreach($videos as $vid)
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      @if($vid->video_url)
      <div class="ratio ratio-16x9">
        <iframe src="{{ $vid->video_url }}" title="{{ $vid->title }}" allowfullscreen></iframe>
      </div>
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $vid->title }}</h5>
        <a href="{{ url('/berita'.$vid->slug) }}" class="btn btn-primary btn-sm">Detail</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endif

@endsection
