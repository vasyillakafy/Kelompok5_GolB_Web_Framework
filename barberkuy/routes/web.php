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

// Route::get('homeku', function () {
//     return view('main');
// });

Route::get('home', function () {
    return view('home');
    
}) ->middleware('auth');

// Route::get('dashboard', function () {
//     return view('dashboard');
// });

Route::get('petugas', function () {
    return view('petugas');
});
Route::get('tambah_petugas', function () {
    return view('tambah_petugas');
});

Route::get('pelanggan', function () {
    return view('pelanggan');
});

Route::get('/test','App\Http\Controllers\Auth\LoginController@buka')->name('test');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('petugas','App\Http\Controllers\petugasController@index')->name('petugas');


Route::post('tambah_petugas','App\Http\Controllers\petugasController@store')->name('tambah_petugas');

Route::get('edit_petugas/{id}','App\Http\Controllers\petugasController@edit')-> name('edit_petugas');
Route::put('update_petugas/{id}', 'App\Http\Controllers\petugasController@update')->name('update_petugas');

Route::delete('hapus_petugas/{id}', 'App\Http\Controllers\petugasController@destroy')->name('hapus_petugas');
