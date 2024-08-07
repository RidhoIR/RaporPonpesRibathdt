<?php

use App\Http\Controllers\Admin\DetailController;
use App\Http\Controllers\Admin\RaporController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\NilaiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('testboostrap');
});

Auth::routes();

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('admin/santri', App\Http\Controllers\Admin\SantriController::class);
    Route::resource('admin/mapel', App\Http\Controllers\Admin\MapelController::class);
    Route::resource('admin/classroom', App\Http\Controllers\Admin\ClassroomController::class);
    Route::resource('admin/detail-rapor', DetailController::class);
    Route::resource('admin/rapor', RaporController::class);
    Route::get('rapor/sughro', [RaporController::class, 'indexSughro'])->name('rapor.index.sughro');
    Route::get('rapor/kubro', [RaporController::class, 'indexKubro'])->name('rapor.index.kubro');
    Route::get('rapor/wustho', [RaporController::class, 'indexWustho'])->name('rapor.index.wustho');
    Route::get('admin/rapor/download/{id}', [RaporController::class, 'downloadPDF'])->name('rapor.download');
    Route::put('/rapor/{id}', [RaporController::class, 'updateRapor'])->name('rapor.update');
    Route::put('/rapor/nilai/{id}', [RaporController::class, 'update'])->name('rapor.update.nilai');

    // Route::get('rapor/filter', [RaporController::class, 'indexFiltered'])->name('rapor.index.filtered');
    // Route::put('/rapor/{id}', [RaporController::class, 'update'])->name('rapor.update');
    // Route::resource('admin/nilai', NilaiController::class);
});