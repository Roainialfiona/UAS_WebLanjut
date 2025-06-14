<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Auth\SocialiteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $publishedBerita = \App\Models\Berita::where('status', 'published')->with('kategori')->latest()->get();
        return view('dashboard', compact('publishedBerita'));
    })->name('dashboard');

    Route::resource('berita', BeritaController::class)->parameters([
    'berita' => 'berita'
    ]); 



    Route::middleware(['role:editor'])->group(function () {
        Route::post('berita/{berita}/approve', [BeritaController::class, 'approve'])->name('berita.approve');
        Route::post('berita/{berita}/unpublish', [BeritaController::class, 'unpublish'])->name('berita.unpublish');
    });
});


Route::get('/auth/{provider}', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');


