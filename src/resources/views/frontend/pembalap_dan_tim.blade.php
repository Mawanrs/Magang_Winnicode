@extends('layouts.app')
@section('content')

<!-- Link ke file CSS custom -->
<link rel="stylesheet" href="{{ asset('css/pembalap.css') }}">

<div class="container mt-4">
    <a href="{{ url()->previous() }}" class="btn-back">
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 0 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
    </svg>
    <span>Kembali</span>
    </a>
    
    <h1 class="section-title d-inline-block mb-3">Pembalap & Tim</h1>
    <!-- Tab Utama -->
    <ul class="nav nav-tabs nav-tabs-custom mb-3" id="mainRiderTeamTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pembalap-main-tab" data-bs-toggle="tab" data-bs-target="#pembalap-main-content" type="button" role="tab">Pembalap</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tim-main-tab" data-bs-toggle="tab" data-bs-target="#tim-main-content" type="button" role="tab">Tim</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="legenda-main-tab" data-bs-toggle="tab" data-bs-target="#legenda-main-content" type="button" role="tab">Legenda</button>
        </li>
    </ul>

    <div class="tab-content" id="mainRiderTeamTabContent">
        <div class="tab-pane fade show active" id="pembalap-main-content" role="tabpanel" aria-labelledby="pembalap-main-tab">
            <div class="mb-2">
                <button class="btn btn-motogp-cat active">MotoGP</button>
                <button class="btn btn-motogp-cat">Moto2</button>
                <button class="btn btn-motogp-cat">Moto3</button>
                <button class="btn btn-motogp-cat">MotoE</button>
            </div>
            <div class="row">
                @forelse($pembalap as $rider)
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card-custom text-center">
                        {{-- Avatar Pembalap --}}
                        <img src="{{ $rider->avatar_url ? asset('storage/'.$rider->avatar_url) : asset('img/default_rider.png') }}"
                             class="card-img-top"
                             alt="{{ $rider->name }}">
                        <div class="card-body">
                            <div class="text-white fw-bold" style="font-size:1rem;">
                                {{ $rider->tag_name }}
                            </div>
                            <div class="card-title">
                                {{ $rider->name }}
                            </div>
                            <div class="rider-nationality">
                                {{-- Foto Bendera: upload > mapping > default --}}
                                @if($rider->flag_image)
                                    <img src="{{ asset('storage/'.$rider->flag_image) }}"
                                         alt="Bendera"
                                         class="rider-card-img">
                                @elseif(isset($flags[$rider->country_code]))
                                    <img src="{{ $flags[$rider->country_code] }}"
                                         alt="{{ $rider->country_code }} Flag"
                                         class="rider-card-img">
                                @else
                                    <img src="{{ asset('img/default_flag.png') }}"
                                         alt="Flag"
                                         class="rider-card-img">
                                @endif
                                <span>{{ $rider->team }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center">Belum ada data pembalap.</p>
                </div>
                @endforelse
            </div>
        </div>
        <!-- Tab "Tim" dan "Legenda" bisa kamu lanjutkan sesuai kebutuhan -->
    </div>
</div>
@endsection
