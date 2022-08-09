<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('adminlte::auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::get('/form/create', [FormController::class, 'create'])->name('form.create');
Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
Route::get('/form/export_excel', [FormController::class, 'downloadExcel'])->name('form.download');

Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
Route::post('penduduk/import_excel', [PendudukController::class, 'uploadExcel'])->name('penduduk.upload');

