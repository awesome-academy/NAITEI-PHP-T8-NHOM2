<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Lấy dashboard làm pivot điều hướng flow user || admin
Route::get('/dashboard', function () {
    return Auth::user()->role === 'admin'
        ? redirect()->route('test.admin') // nếu là ad, nhảy qua route test-admin
        : redirect()->route('test.user'); // nếu là user, ngược lại
})
->middleware(['auth', 'verified'])
->name('dashboard');


// Các route test-user / test-admin ghi đè lên dashboard
Route::view('/test-user', 'test-user')
     ->middleware('auth')
     ->name('test.user');

Route::view('/test-admin', 'test-admin')
     ->middleware(['auth', AdminMiddleware::class])
     ->name('test.admin');

require __DIR__.'/auth.php';
