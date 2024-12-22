<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MidtransController;

Route::get('/lupa-password', [PasswordResetController::class, 'showResetForm'])->name('password.request');
Route::post('/lupa-password', [PasswordResetController::class, 'resetPassword'])->name('reset.password');

// Route::get('/', function () {
//     return view('homepage');
// });

// Route::get('/dashboard', function () {
//     return view('profile.dashboard');
// });

Route::get('/signin', [AuthController::class, 'showLoginForm'])->name('signin');
Route::post('/signin', [AuthController::class, 'login'])->name('signin.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/homepage', [HomeController::class, 'index'])->middleware('auth')->name('homepage');
Route::get('/signup', [AuthController::class, 'showSignUpForm'])->name('signup');
// Route::post('/signup', [AuthController::class, 'register']);
Route::post('/signup', [AuthController::class, 'register'])->name('signup');
Route::get('/insertKost', function () {
    return view('insertKost');
})->name('insertKost');

Route::post('/insert-kos', [KosController::class, 'store'])->name('storeKos');

Route::get('/detail-kos/{id}', [KosController::class, 'detail'])->name('detailKos');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/Prosesprofile/{id}', [ProfileController::class, 'update'])->name('proses.profile');
// Route::resource('profile','ProfileController');


// Route::get('/homepage', function () {
//     return view('homepage');
// })->name('homepage');

// Route::post('/proses-ulasan/{id}', [HomeController::class, 'store'])->name('prosesUlasan');

Route::post('/ulasan/{id}', [UlasanController::class, 'storeOrUpdate'])->name('prosesUlasan');

Route::get('/favorit', [HomeController::class, 'favorit'])->name('favorit');

Route::post('/favorit/{id}', [HomeController::class, 'tambahFavorit'])->name('tambahFavorit');

Route::post('/unlist/{id}', [HomeController::class, 'unlist'])->name('unlist');

Route::get('/homepage', [HomeController::class, 'index'])->name('homepage')->middleware('auth');

Route::get('/login', function () {
    return view('signin');
})->name('signin')->middleware('guest');

Route::get('/', function () {
    return view('signin');
});

Route::get('/map', [MapController::class, 'index']);

Route::get('/payment', [MidtransController::class, 'index'])->name('payment.index');
Route::post('/payment/process', [MidtransController::class, 'processPayment'])->name('process.payment');


