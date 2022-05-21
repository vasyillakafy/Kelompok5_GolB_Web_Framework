<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('dashboard', function () {
    return view('dashboard');
});
Route::get('tambah_kategori', function () {
    return view('tambah_kategori');
});
// Route::get('tambah_barang', function () {
//     return view('tambah_barang');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::group(['middleware' => ['auth', 'ceklevel:1,2']], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //admin dan donatur
    // Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('admin', [App\Http\Controllers\HomeController::class, 'admin']);
    Route::get('tambah-admin', [App\Http\Controllers\HomeController::class, 'tambah_admin']);
    Route::post('tambah-admin', [App\Http\Controllers\HomeController::class, 'tambah_admin_process']);
    Route::delete('hapus-admin/{user}', [App\Http\Controllers\HomeController::class, 'hapus_admin']);

    //pelanggan
    Route::get('user', [App\Http\Controllers\HomeController::class, 'user']);
    Route::get('tambah-user', [App\Http\Controllers\HomeController::class, 'tambah_user']);
    Route::post('tambah-user', [App\Http\Controllers\HomeController::class, 'tambah_user_process']);
    Route::delete('hapus-user/{user}', [App\Http\Controllers\HomeController::class, 'hapus_user']);

    //kategori
    Route::get('kategori', 'App\Http\Controllers\kategoriController@index')->name('kategori');
    Route::post('tambah_kategori', 'App\Http\Controllers\kategoriController@store')->name('tambah_kategori');
    Route::get('edit_kategori/{id}', 'App\Http\Controllers\kategoriController@edit')->name('edit_kategori');
    Route::put('update_kategori/{id}', 'App\Http\Controllers\kategoriController@update')->name('update_kategori');
    Route::delete('hapus_kategori/{id}', 'App\Http\Controllers\kategoriController@destroy')->name('hapus_kategori');

    //barang
    Route::get('barang', 'App\Http\Controllers\barangController@index')->name('barang');
    Route::get('tambah_barang', 'App\Http\Controllers\barangController@create')->name('tambah_barang');
    Route::post('tambah_barang', 'App\Http\Controllers\barangController@store')->name('tambah_barang');
    Route::get('edit_barang/{id}', 'App\Http\Controllers\barangController@edit')->name('edit_barang');
    Route::put('update_barang/{id}', 'App\Http\Controllers\barangController@update')->name('update_barang');
    Route::delete('hapus_barang/{id}', 'App\Http\Controllers\barangController@destroy')->name('hapus_barang');
    // Route::get('home', 'App\Http\Controllers\barangController@jumlahbarang')->name('jumlahbarang');


    //kelola barang
    Route::get('kelola_barang', 'App\Http\Controllers\kelolaController@index')->name('kelola_barang');

    //detail kelola barang
    Route::get('detail_kelola/{id}/{status}', 'App\Http\Controllers\kelolaController@show');
    // Route::put('update_kelola/{id}', 'App\Http\Controllers\kelolaController@update');
    Route::patch('update/{id}', 'App\Http\Controllers\kelolaController@update')->name('update');
});
