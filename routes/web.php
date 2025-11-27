<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// route admin 


    Route::get('/admin/logout', [Admincontroller::class, 'AdminLogout'])->name('admin.logout');
    Route::post('/admin/login', [Admincontroller::class, 'AdminLogin'])->name('admin.login');
    Route::get('/verify', [Admincontroller::class, 'ShowVerification'])->name('custom.verification.form');
    Route::post('/verify', [Admincontroller::class, 'VerificationVerify'])->name('custom.verification.verify');
    


// route admin end

Route::middleware('auth')->group(function () {

Route::get('/profile', [Admincontroller::class, 'AdminProfile'])->name('admin.profile');
Route::post('/profile/store', [Admincontroller::class, 'ProfileStore'])->name('profile.store');

});


