<?php

use App\Http\Controllers\KategoriController;
use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KemasanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Models\Kategori;
use App\Models\Ukm;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/navbar',[DashboardController::class,'post']);
    Route::resource('/sahabat',KemasanController::class);
    Route::resource('/anggota',AnggotaController::class)->middleware('IsAdmin');
    Route::resource('/laporan',LaporanController::class);
    Route::resource('/artikel',ArtikelController::class);
    Route::get('/logout',[LoginController::class,'logout']);
    Route::post('/kategoriukm',[KategoriController::class,'store']);
});

Route::middleware(['guest'])->group(function (){
    Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
    Route::post('/login',[LoginController::class,'authenticate']);
});

Route::get('/',[FrontController::class,'index']);

Route::get('/email', function () {
    Mail::to('hosting.gilbranid@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});

Route::get('ukm/{ukm:slug}', function (Ukm $ukm) {
    return view('frontend.ukm.index',[
        'title' => $ukm->nama,
        'deskripsi' => $ukm->deskripsi,
        'foto' => $ukm->foto,
        'url' => $ukm->url,
        
    ]);
});

Route::get('/kategori/{kategori:slug}',function(Kategori $kategori){
    return view('frontend.kategori',[
        'title' => $kategori->nama,
        'ukm' => $kategori->ukm,
        'kategori' => $kategori->nama
    ]);
});