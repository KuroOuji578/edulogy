<?php

use App\Http\Controllers\AgamaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MetadataController;
use Illuminate\Support\Facades\Route;

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
//route landing page
Route::get('/', function () {
    return view('landing.index');
})->name('landing');
Route::get('/landing/create', [LandingController::class, 'create'])->name('landing.create');
Route::post('/landing/store', [LandingController::class, 'store'])->name('landing.store');

//========================
//route admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dash');
Route::get('/metadata', [MetadataController::class, 'index'])->name('meta');
Route::get('/register/destroy/{id}', [MetadataController::class, 'destroy'])->name('register.destroy');
Route::get('/register/edit/{id}', [MetadataController::class, 'edit'])->name('register.edit');
Route::put('/register/update/{id}', [MetadataController::class, 'update'])->name('register.update');

//========================
//route agama
Route::get('/agama/create', [AgamaController::class, 'create'])->name('agama.create');
Route::post('/agama/store', [AgamaController::class, 'store'])->name('agama.store');
Route::get('/agama/edit/{id}', [AgamaController::class, 'edit'])->name('agama.edit');
Route::put('/agama/update/{id}', [AgamaController::class, 'update'])->name('agama.update');
Route::get('/agama/destroy/{id}', [AgamaController::class, 'destroy'])->name('agama.destroy');

//========================
//route Jurusan
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::get('/jurusan/destroy/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
