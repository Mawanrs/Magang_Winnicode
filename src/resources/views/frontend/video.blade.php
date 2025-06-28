@extends('layouts.app')

@section('content')
<div class="container">
    <div class="section-header d-flex justify-content-between align-items-center mb-4">
        <div class="section-title">Video Terbaru</div>
    </div>
    <div class="video-grid">
        @forelse($videos as $vid)
        <a href="{{ route('video.detail', $vid->slug) }}" class="video-card" style="text-decoration:none;">
            <div class="video-thumb-wrap">
                <img src="{{ asset('storage/'.$vid->thumbnail) }}" alt="{{ $vid->title }}" class="video-thumb">
                <span class="video-duration"><i class="bi bi-play-fill"></i>{{ $vid->duration }}</span>
                <div class="video-overlay"></div>
            </div>
            <div class="video-info">
                <div class="video-title">{{ $vid->title }}</div>
                <div class="video-desc">{{ \Illuminate\Support\Str::limit(strip_tags($vid->desc), 70) }}</div>
                <div class="video-date">{{ \Carbon\Carbon::parse($vid->created_at)->translatedFormat('d F Y') }}</div>
            </div>
        </a>
        @empty
        <div class="text-muted">Belum ada video.</div>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $videos->links() }}
    </div>
</div>
@endsection
