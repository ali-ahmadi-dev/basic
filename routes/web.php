<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.index');
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



// route profile
Route::middleware('auth')->group(function () {

Route::get('/profile', [Admincontroller::class, 'AdminProfile'])->name('admin.profile');
Route::post('/profile/store', [Admincontroller::class, 'ProfileStore'])->name('profile.store');
Route::post('/admin/password/updata', [Admincontroller::class, 'PasswordUpdate'])->name('admin.password.update');

});
// route profile end






// route review

Route::middleware('auth')->group(function () {

Route::controller(ReviewController::class)->group(function(){

    Route::get('/all/review', 'AllReview')->name('all.review');
    Route::get('/add/review', 'AddReview')->name('add.review');
    Route::post('/store/review', 'StoreReview')->name('store.review');
    Route::get('/edit/review/{id}', 'EditReview')->name('edit.review');
    Route::post('/update/review/{id}', 'UpdateReview')->name('update.review');
    Route::get('/delete/review/{id}', 'DeleteReview')->name('delete.review');
});

});

// route review end





// route slider

Route::controller(SliderController::class)->group(function(){

    Route::get('/get/slider', 'GetSlider')->name('get.slider');
     Route::post('/update/slider/{id}', 'UpdateSlider')->name('update.slider');

});

// route slider end