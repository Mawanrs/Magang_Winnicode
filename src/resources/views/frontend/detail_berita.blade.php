@extends('layouts.app')
@section('content')
<div class="berita-detail-header">
    <div class="berita-detail-headline">
        <div class="berita-breadcrumb mb-1">
            <a href="{{ url('/') }}">Home</a>
            <span class="dot"></span>
            <a href="{{ route('berita') }}">Berita</a>
            <span class="dot"></span>
            <span class="slug-text">{{ $berita->slug }}</span>
        </div>
        <a href="{{ url()->previous() }}" class="berita-back-link mb-2">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali</span>
        </a>
        <h1>{{ $berita->title }}</h1>
        <div class="meta">
            <span>{{$berita->penulis}}</span>
            <span class="dot"></span>
            <span>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y') }}</span>
        </div>
        <a href="#" class="share-btn mt-2">
            <i class="bi bi-share"></i>BAGIKAN
        </a>
    </div>
    <div class="berita-detail-image-wrapper">
        <img src="{{ asset('storage/'.$berita->image) }}" class="berita-detail-img" alt="{{ $berita->title }}">
    </div>
</div>

<div class="berita-detail-main-content">
    <div class="berita-main-left">
        <div class="berita-detail-content">
            {!! $berita->content !!}
        </div>
        {{-- Komentar Section --}}
        <div class="berita-komentar-wrapper">
            <div class="berita-komentar-title">Komentar</div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('berita.komentar', $berita->slug) }}" method="POST" class="berita-komentar-form mb-3">
                @csrf
                <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                @error('nama') <div class="text-danger small">{{ $message }}</div> @enderror

                <input type="email" name="email" placeholder="Email (opsional)" value="{{ old('email') }}">
                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror

                <textarea name="isi" rows="3" placeholder="Tulis komentar..." required>{{ old('isi') }}</textarea>
                @error('isi') <div class="text-danger small">{{ $message }}</div> @enderror

                <button type="submit" class="btn-kirim-komentar">Kirim</button>
            </form>
            <div class="berita-komentar-list">
                @if($berita->komentar && $berita->komentar->count())
                    @foreach($berita->komentar as $komentar)
                        <div class="berita-komentar-item">
                            <div class="berita-komentar-nama">{{ $komentar->nama }}</div>
                            <div class="berita-komentar-tgl">{{ \Carbon\Carbon::parse($komentar->created_at)->diffForHumans() }}</div>
                            <div class="berita-komentar-isi">{{ $komentar->isi }}</div>
                        </div>
                    @endforeach
                @else
                    <div class="berita-komentar-empty">Belum ada komentar.</div>
                @endif
            </div>
        </div>
    </div>
    <aside class="berita-main-right">
        <div class="berita-topic-title">TOPIK TERKAIT</div>
        <div class="berita-topic-list">
            <span class="badge">RIDER MARKET</span>
            <span class="badge">LATEST-NEWS</span>
        </div>
        <div class="berita-side-news-list mt-4">
            <div class="berita-topic-title mb-3" style="font-size:1em;">Berita Lainnya</div>
            @foreach($otherNews as $item)
                <a href="{{ route('berita.detail', $item->slug) }}" class="d-flex mb-3 align-items-center text-decoration-none">
                    <img src="{{ asset('storage/'.$item->image) }}" style="width:70px; height:52px; object-fit:cover; border-radius:7px; margin-right:11px;">
                    <div>
                        <div class="fw-bold" style="font-size:.99em; color:#222;">{{ $item->title }}</div>
                        <div class="text-muted" style="font-size:.94em;">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </aside>
</div>
@endsection
