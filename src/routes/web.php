<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalPertandinganController;
use App\Http\Controllers\UserProfileController;
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
Route::get('/berita', [FrontendController::class, 'berita']);
Route::get('/hasil-dan-klasemen', [FrontendController::class, 'hasil_dan_klasemen']);
Route::get('/detail_berita', [FrontendController::class, 'detail_berita']);
    


//  Frontend Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('frontend.profile.show');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('frontend.profile.edit');
    Route::get('/profile/change-email', [UserProfileController::class, 'changeEmail'])->name('frontend.profile.change-email');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('frontend.profile.update');
});


//  Login dan Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Logout
Route::post('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');
