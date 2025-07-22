<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
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
Route::get('/jadwal', [FrontendController::class, 'schedule']);
Route::get('/pembalap_dan_tim', [FrontendController::class, 'pembalap']);
Route::get('/berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [FrontendController::class, 'berita_detail'])->name('berita.detail');
Route::post('/berita/{slug}/komentar', [FrontendController::class, 'storeKomentar'])->name('berita.komentar')->middleware('auth');
Route::get('/hasil-dan-klasemen', [FrontendController::class, 'hasilKlasemen'])->name('hasil_dan_klasemen');
Route::get('/hasil-balapan', [FrontendController::class, 'hasilBalapan'])->name('hasil.balapan');
Route::get('/klasemen-tim', [FrontendController::class, 'klasemenTim'])->name('klasemen.tim');
Route::get('/cuaca', [CuacaController::class, 'index'])->name('cuaca.index');
Route::post('/cuaca', [FrontendController::class, 'update'])->middleware('auth')->name('cuaca.update');
Route::get('/detail_berita', [FrontendController::class, 'detail_berita']);
Route::get('/videos', [FrontendController::class, 'video'])->name('videos');
Route::get('/videos/{slug}', [FrontendController::class, 'videoDetail'])->name('video.detail');
    


//  Frontend Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('frontend.profile.show');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('frontend.profile.edit');
    Route::get('/profile/change-email', [UserProfileController::class, 'changeEmail'])->name('frontend.profile.change-email');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('frontend.profile.update');
});


// Login dan Register
Route::get('/login', function () {
    // Menyimpan URL yang diminta sebelumnya ke session
    session(['url.intended' => url()->previous()]);
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Logout
Route::post('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');
