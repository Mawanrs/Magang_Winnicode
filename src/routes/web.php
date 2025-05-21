<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalPertandinganController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
Route::get('/', function () {
    return view('welcome');
});

//  Frontend
Route::get('/', [FrontendController::class, 'home']);
Route::get('/jadwal', [FrontendController::class, 'jadwal']);
Route::get('/pembalap_dan_tim', [FrontendController::class, 'pembalap']);
Route::get('/berita', [FrontendController::class, 'berita']);
Route::get('/hasil-dan-klasemen', [FrontendController::class, 'hasil_dan_klasemen']);
Route::get('/detail_berita', [FrontendController::class, 'detail_berita']);
Route::get('/info_harga_tiket', [FrontendController::class, 'infomasi_tiket']);

//  Login
