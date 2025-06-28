@extends('layouts.app')

@section('content')
@php
function getYoutubeId($url) {
    $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
    if (preg_match($pattern, $url, $matches)) {
        return $matches[1];
    }
    return null;
}
$videoId = getYoutubeId($video->youtube_url);
@endphp
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-8 mb-3">
            <div class="mb-3">
                <div class="ratio ratio-16x9">
                    @if($videoId)
                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}?start=0&end=180" frameborder="0" allowfullscreen></iframe>
                    @else
                        <img src="{{ asset('storage/'.$video->thumbnail) }}" class="w-100">
                    @endif
                </div>
            </div>
            <h1 style="font-size:1.8em;">{{ $video->title }}</h1>
            <div class="mb-2 text-muted">{{ \Carbon\Carbon::parse($video->created_at)->translatedFormat('d F Y') }}</div>
            <div class="mb-4">{{ $video->desc }}</div>
            <div class="mb-3">
                <a href="{{ $video->youtube_url }}" target="_blank" class="btn btn-danger">
                    <i class="bi bi-youtube me-1"></i> Lanjutkan Tonton di YouTube
                </a>
                <div class="text-muted mt-1" style="font-size:.97em;">
                    Sisa potongan video bisa kamu tonton langsung di channel YouTube MotoGP resmi.
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h5 class="mb-3">Video Lainnya</h5>
            @foreach($otherVideos as $vid)
                <a href="{{ route('video.detail', $vid->slug) }}" class="d-flex mb-3 align-items-center text-decoration-none">
                    <img src="{{ asset('storage/'.$vid->thumbnail) }}" style="width:80px; height:60px; object-fit:cover; border-radius:7px; margin-right:13px;">
                    <div>
                        <div class="fw-bold" style="font-size:1em; color:#222;">{{ $vid->title }}</div>
                        <div class="text-muted" style="font-size:.95em;">{{ \Carbon\Carbon::parse($vid->created_at)->translatedFormat('d M Y') }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
