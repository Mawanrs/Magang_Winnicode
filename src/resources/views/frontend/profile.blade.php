@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row" style="min-height:100vh;">
        <!-- Sidebar -->
        <div class="col-md-3 bg-white p-0" style="border-right:1px solid #eee;">
            <div class="d-flex flex-column align-items-center py-4">
                <img src="{{ asset('images/default-avatar.png') }}" alt="avatar" class="rounded-circle mb-2" width="64" height="64">
                <div class="fw-bold mb-1" style="font-size:1rem;">{{ Str::limit($user->email, 20) }}</div>
                <small class="text-muted mb-3">Penggemar sejak {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</small>
            </div>
            <ul class="nav flex-column mb-4">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('frontend.profile.edit') ? 'active' : '' }}" href="{{ route('frontend.profile.edit') }}">
                        <i class="bi bi-person"></i> Data pribadi
                    </a>
                </li>
                <!-- Menu lainnya -->
            </ul>
        </div>
        <!-- End Sidebar -->

        <!-- Main Content -->
        <div class="col-md-9 d-flex justify-content-center align-items-start pt-5 pb-5" style="background:#f4f4f4;">
            <div class="card shadow-sm w-75">
                <div class="card-body">
                    <h3 class="fw-bold mb-3 text-center" style="letter-spacing:1px;">AKUN SAYA</h3>
                    <form method="POST" action="{{ route('frontend.profile.update') }}">
                        @csrf

                        <h5 class="mb-3 fw-bold">Data pribadi</h5>
                        <p class="text-muted" style="margin-top:-8px; font-size:0.95rem;">
                            Informasi dasar, seperti nama, tanggal lahir dan negara, untuk akun Dorna Anda
                        </p>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Surel</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Belakang</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Panggilan</label>
                            <input type="text" class="form-control" name="nickname" value="{{ old('nickname', $user->nickname) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Jenis Kelamin</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="pria" value="Pria" {{ $user->gender == 'Pria' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pria">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="wanita" value="Wanita" {{ $user->gender == 'Wanita' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="wanita">Wanita</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="lainnya" value="Lainnya" {{ $user->gender == 'Lainnya' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lainnya">Lainnya</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Negara</label>
                            <input type="text" class="form-control" name="country" value="{{ old('country', $user->country) }}">
                        </div>

                        <button type="submit" class="btn btn-danger fw-bold px-4">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</div>
@endsection
