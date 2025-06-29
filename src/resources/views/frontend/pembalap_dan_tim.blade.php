@extends('layouts.app')
@section('content')

<!-- Link ke file CSS custom -->
<link rel="stylesheet" href="{{ asset('css/pembalap.css') }}">

<div class="main-wrapper">
    <!-- Header Section -->
    <div class="header-section">
        <div class="container">
            <a href="{{ url()->previous() }}" class="btn-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 0 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
                </svg>
                <span>Kembali</span>
            </a>
            
            <div class="header-title-section">
                <h1 class="section-title">Pembalap & Tim</h1>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="nav-section">
        <div class="container">
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
        </div>
    </div>

    <!-- Content Section -->
    <div class="content-section">
        <div class="container">
            <div class="tab-content" id="mainRiderTeamTabContent">
                <div class="tab-pane fade show active" id="pembalap-main-content" role="tabpanel" aria-labelledby="pembalap-main-tab">
                    <!-- Category Buttons -->
                    <div class="category-buttons-wrapper mb-4">
                        <button class="btn btn-motogp-cat active" onclick="setActiveCategory(this)" data-category="motogp">MotoGP</button>
                        <button class="btn btn-motogp-cat" onclick="setActiveCategory(this)" data-category="moto2">Moto2</button>
                        <button class="btn btn-motogp-cat" onclick="setActiveCategory(this)" data-category="moto3">Moto3</button>
                        <button class="btn btn-motogp-cat" onclick="setActiveCategory(this)" data-category="motoe">MotoE</button>
                    </div>

                    <!-- Riders Grid -->
                    <div class="riders-grid-wrapper">
                        <div class="row riders-grid">
                            @forelse($pembalap as $rider)
                            <div class="col-6 col-md-4 col-lg-3 mb-4 rider-item" data-category="{{ strtolower($rider->category ?? 'motogp') }}">
                                <div class="card-custom text-center">
                                    <!-- Rider Number -->
                                    @if($rider->tag_name)
                                    <div class="rider-number">{{ $rider->tag_name }}</div>
                                    @endif
                                    
                                    <!-- Avatar Pembalap -->
                                    <div class="rider-image-wrapper">
                                        <img src="{{ $rider->avatar_url ? asset('storage/'.$rider->avatar_url) : asset('img/default_rider.png') }}"
                                             class="card-img-top"
                                             alt="{{ $rider->name }}">
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="rider-tag text-white fw-bold">
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
                                            <span class="rider-team">{{ $rider->team }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <div class="no-data-message">
                                    <p class="text-center">Belum ada data pembalap.</p>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Tab Tim Content -->
                <div class="tab-pane fade" id="tim-main-content" role="tabpanel" aria-labelledby="tim-main-tab">
                    <div class="coming-soon-section">
                        <h3>Tim Section</h3>
                        <p>Konten tim akan ditambahkan di sini.</p>
                    </div>
                </div>

                <!-- Tab Legenda Content -->
                <div class="tab-pane fade" id="legenda-main-content" role="tabpanel" aria-labelledby="legenda-main-tab">
                    <div class="coming-soon-section">
                        <h3>Legenda Section</h3>
                        <p>Konten legenda akan ditambahkan di sini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Category filtering functionality
        function setActiveCategory(element) {
            // Remove active class from all category buttons
            document.querySelectorAll('.btn-motogp-cat').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Add active class to clicked button
            element.classList.add('active');
            
            // Get the category to filter
            const category = element.getAttribute('data-category');
            
            // Filter riders based on category
            const riderItems = document.querySelectorAll('.rider-item');
            riderItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                if (category === 'motogp' || itemCategory === category) {
                    item.style.display = 'block';
                    item.style.opacity = '0';
                    setTimeout(() => {
                        item.style.opacity = '1';
                    }, 100);
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Make setActiveCategory globally available
        window.setActiveCategory = setActiveCategory;

        // Card animations on scroll
        const cards = document.querySelectorAll('.card-custom');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }, {
            threshold: 0.1
        });

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });

        // Tab switching animation
        const tabLinks = document.querySelectorAll('[data-bs-toggle="tab"]');
        tabLinks.forEach(tab => {
            tab.addEventListener('shown.bs.tab', function (e) {
                const targetPane = document.querySelector(e.target.getAttribute('data-bs-target'));
                if (targetPane) {
                    targetPane.style.opacity = '0';
                    setTimeout(() => {
                        targetPane.style.opacity = '1';
                    }, 100);
                }
            });
        });
    });
</script>

@endsection