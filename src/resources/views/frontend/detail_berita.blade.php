@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-8 mb-3">
            <img src="{{ asset('storage/'.$berita->image) }}" class="w-100 mb-3" alt="{{ $berita->title }}" style="border-radius:9px;">
            <h1 style="font-size:2em; font-weight:bold;">{{ $berita->title }}</h1>
            <div class="mb-2 text-muted">{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}</div>
            <div class="mb-4" style="font-size:1.1em;">{!! $berita->content !!}</div>
        </div>
        <div class="col-lg-4">
            <h5 class="mb-3">Berita Lainnya</h5>
            @foreach($otherNews as $item)
                <a href="{{ route('berita.detail', $item->slug) }}" class="d-flex mb-3 align-items-center text-decoration-none">
                    <img src="{{ asset('storage/'.$item->image) }}" style="width:80px; height:60px; object-fit:cover; border-radius:7px; margin-right:13px;">
                    <div>
                        <div class="fw-bold" style="font-size:1em; color:#222;">{{ $item->title }}</div>
                        <div class="text-muted" style="font-size:.95em;">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
