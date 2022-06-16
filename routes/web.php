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
use App\Http\Controllers\DbController;
use App\Http\Controllers\LuasPPController;
use App\Http\Controllers\BldController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KotaAutController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\KotaApiController;
use App\Http\Controllers\KotaClientController;
use App\Http\Controllers\TarifController;

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
})->middleware('auth');

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

// Route::resource('kota', KotaController::class);

Route::resource('penerbit', PenerbitController::class);
Route::resource('buku', BukuController::class);

Route::get('search',[BukuController::class, 'search'])->name('search');

Route::get('elo/save',[EloController::class, 'eloSave']);

Route::get('elo/delete',[EloController::class, 'eloDelete']);

Route::get('elo/penerbit',[EloController::class, 'penerbitSave']);

Route::get('elo/buku',[EloController::class, 'bukuSave']);

Route::get('db/bacaDb1',[DbController::class, 'bacaDb1']);
Route::get('db/bacaDb2',[DbController::class, 'bacaDb2']);

Route::get('db/buku',[BukuController::class, 'joinData']);

Route::resource('luas-persegi-panjang', LuasPPController::class);

Route::get('bld/haloAkakom',[BldController::class, 'haloAkakom']);
Route::get('bld/kota',[BldController::class, 'bacaTabel']);
Route::get('bld/daftarBarang',[BldController::class, 'bacaTabel0']);
Route::get('bld/cetakNota',[BldController::class, 'cetakNota']);
Route::get('bld/daftarBelanja',[BldController::class, 'bacaTabel1'])->name('cetakNota.id');

Route::resource('anggota', AnggotaController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class);

Route::get('kota/gate', [KotaController::class, 'gate'])->name('kota.gate');

Route::get('kotaAut/view',[KotaAutController::class, 'view']);
Route::get('kotaAut/create',[KotaAutController::class, 'create']);
Route::get('kotaAut/update',[KotaAutController::class, 'update']);
Route::get('kotaAut/delete',[KotaAutController::class, 'delete']);

Route::get('barang/gate', [BarangController::class, 'gate']);
Route::get('barang/policies', [BarangController::class, 'policies']);

Route::get('service/post/gate', [PostController::class, 'gate']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('api/kota',[KotaApiController::class, 'index']);
Route::post('api/kota/create',[KotaApiController::class, 'create']);
Route::delete('api/kota/{id}',[KotaApiController::class, 'delete']);

Route::get('kotaClient/', [KotaClientController::class, 'index'])
->name('kotaClient.index');

Route::resource('tarif', TarifController::class);