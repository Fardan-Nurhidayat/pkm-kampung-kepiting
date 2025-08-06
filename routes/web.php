<?php

use App\Livewire\Blogs;
use App\Livewire\Auth\Login;
use App\Livewire\ErrorAlert;
use App\Livewire\Auth\Verify;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Passwords\Confirm;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BlogLikeController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Livewire\Products\Index as ProductIndex;
use App\Livewire\Products\Show as ProductShow;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name('home');
// Route::view('/products', 'products.index')->name('products');
Route::get('/products', ProductIndex::class)->name('products');
Route::get('/produk/{slug}', ProductShow::class)->name('products.show');
Route::resource('blogs', BlogsController::class)->only(['show']);
Route::get('/blogs', Blogs::class)->name('blogs.index');
Route::post('/blogs/{blog}/like', [BlogLikeController::class, 'toggle'])->name('blogs.like');
Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
