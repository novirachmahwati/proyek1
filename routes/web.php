<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KataBijakController;
use App\Http\Controllers\TabelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\EloController;

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
    return view('welcome');
});

Route::get('webKu/', function () {
    return "Halo Apa kabar...........?";
    });

$logic = function()
{
return 'STMIK AKAKOM Yogyakarta..........!';
};
Route::get('webKu1', $logic);

// Route::get('/buku/{judul?}', function($judul=null)
// {
//     if ($judul == null) return 'Buku tak berjudul.';
//     return "Buku <b>{$judul}</b> adalah termasuk buku komputer.";
// });

Route::get('/pepatah', function()
{
return View::make('pepatah');
});

Route::get('kata-bijak/kata',[KataBijakController::class, 'kata']
)->name('kata-bijak.pepatah');

// Route::get('coba', function () {
//     return "Orang menamakan cinta sebagai sesuatu hal yang imajiner. Nyatanya, hal imajiner ini
//     justru membawa Anda kepada kehidupan yang baik. Dengan cinta, Anda bisa
//     merasakan simpati dan empati, dan membuat <b>hidup bahagia</b>. Hidup bersama cinta
//     dipandu dengan ilmu pengetahuan akan membuat hidup Anda seimbang.";
// });

Route::get('/coba', function()
{
return View::make('coba');
});

Route::get('tabel/{n}',[TabelController::class, 'index']);

Route::get('/pangkat/{nilai}', function($nilai)
{
    return pow($nilai, 2);
});

Route::get('user',[UserController::class, 'index']);
Route::post('user',[UserController::class, 'store']);
Route::put('user/{id}',[UserController::class, 'update']);
Route::delete('user/{id}',[UserController::class, 'destroy']);

Route::resource('propinsi', PropinsiController::class);

Route::resource('kota', KotaController::class);

Route::resource('penerbit', PenerbitController::class);
Route::resource('buku', BukuController::class);

Route::get('search',[BukuController::class, 'search'])->name('search');

Route::get('elo/save',[EloController::class, 'eloSave']);

Route::get('elo/delete',[EloController::class, 'eloDelete']);

Route::get('elo/penerbit',[EloController::class, 'penerbitSave']);

Route::get('elo/buku',[EloController::class, 'bukuSave']);