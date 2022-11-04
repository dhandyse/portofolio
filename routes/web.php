<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/education', [SiteController::class, 'education'])->name('site.education');

Route::prefix('dokumen')->name('site.dokumen.')->group(function () {
    Route::get('/', [SiteController::class, 'dokumen'])->name('index');
    Route::get('create', [SiteController::class, 'create'])->name('create');
    Route::post('store', [SiteController::class, 'store'])->name('store');
    Route::get('scopeData', [SiteController::class, 'scopeData'])->name('scopeData');
    Route::get('ubah/{id}', [SiteController::class, 'ubah'])->name('ubah');
    Route::post('update', [SiteController::class, 'update'])->name('update');

    Route::post('destroy', [SiteController::class, 'destroy'])->name('destroy');
});

// Route::get('site/dokumen', 'DokumenController@index')->name('dokumen')->middleware("group:" . config('global.admin_group'));
// Route::get('scopeData', 'DokumenController@scopeData')->name('scopeData');
// Route::get('create', 'DokumenController@create')->name('create');
// Route::post('store', 'DokumenController@store')->name('store');
// Route::get('ubah/{id}', 'DokumenController@ubah')->name('ubah');
// Route::post('update', 'DokumenController@update')->name('update');
// Route::get('detail/{id}', 'DokumenController@detail')->name('detail');
// Route::get('cetak/{id}', 'DokumenController@cetak')->name('cetak');
// Route::post('destroy', 'DokumenController@destroy')->name('destroy');
