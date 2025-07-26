<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengajuanKPACOntroller;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SpjController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('home');
    });
    Route::get('/dasboarad', function () {
        return view('home');
    });

    Route::resource('pemasukan', PemasukanController::class);

    Route::resource('pengeluaran', PengeluaranController::class);
    Route::get('/laporan-pemasukan', function () {
        return view('laporan-pemasukan');
    });
    Route::get('/pemasukan/export', [PemasukanController::class, 'export'])->name('pemasukan.export');

    // SPJ
    Route::get('/spj', [SpjController::class, 'index'])->name('spj');
    Route::get('/spj/cek/{id}', [SpjController::class, 'cek'])->name('spj.cek');
    Route::post('/spj/upload_spj', [SpjController::class, 'upload_spj'])->name('spj.upload_spj');
    Route::post('/spj/setujui', [SpjController::class, 'setujui'])->name('spj.setujui');
    Route::get('/spj/view/{id}', [SpjController::class, 'view'])->name('spj.view');

    // Pengajuan KPA
    Route::get('/pengajuan-kpa', [PengajuanKPACOntroller::class, 'index'])->name('pengajuan-kpa');
    Route::get('/pengajuan-kpa/{id}', [PengajuanKPACOntroller::class, 'detail'])->name('pengajuan-kpa.detail');
    Route::post('/pengajuan-kpa', [PengajuanKPACOntroller::class, 'tambah'])->name('pengajuan-kpa.add');
    Route::post('/pengajuan-kpa/item', [PengajuanKPACOntroller::class, 'addItem'])->name('pengajuan-kpa.addItem');
    Route::post('/pengajuan-kpa/ajukan', [PengajuanKPACOntroller::class, 'ajukan'])->name('pengajuan-kpa.ajukan');
    Route::delete('/pengajuan-kpa/{id}', [PengajuanKPACOntroller::class, 'hapus'])->name('pengajuan-kpa.del');

    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('lembaga', LembagaController::class);

    // Pengajuan
    Route::resource('pengajuan', PengajuanController::class);
    Route::post('/pengajuan/setujui', [PengajuanController::class, 'setujui'])->name('pengajuan.setujui');
    Route::post('/pengajuan/tolak', [PengajuanController::class, 'tolak'])->name('pengajuan.tolak');
    Route::post('/pengajuan/cairkan', [PengajuanController::class, 'cairkan'])->name('pengajuan.cairkan');
    Route::get('/pengajuan/cair/{id}', [PengajuanController::class, 'cair'])->name('pengajuan.cair');
});
