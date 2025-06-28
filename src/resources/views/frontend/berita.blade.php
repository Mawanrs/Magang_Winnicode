@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4" style="font-weight: bold; font-size: 2em;">Berita Terbaru</h1>
    <div class="row">
        @foreach($news as $item)
        <div class="col-md-4 mb-4">
            <a href="{{ route('berita.detail', $item->slug) }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="{{ $item->title }}">
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bold;">{{ $item->title }}</h5>
                        <p class="card-text text-muted" style="font-size:0.98em;">{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 80) }}</p>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</small>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $news->links() }}
    </div>
</div>
@endsection