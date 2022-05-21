<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\barangController;
use App\Http\Controllers\API\kategoriController;
use App\Http\Controllers\API\usersController;
use App\Http\Controllers\API\transaksiController;
use App\Http\Controllers\API\userController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('register','App\Http\Controllers\API\registerController');
// Route::post('login','App\Http\Controllers\API\loginController');
// Route::get('data_login','App\Http\Controllers\API\loginController@index');
// Route::post('tambah_login','App\Http\Controllers\API\loginController@store');
// Route::get('tampil_login/{id}','App\Http\Controllers\API\loginController@show');
// Route::post('update_login/{id}','App\Http\Controllers\API\loginController@update');
// Route::get('hapus_login/{id}','App\Http\Controllers\API\loginController@del');

// Route::get('barang','App\Http\Controllers\API\barangController@index');

Route::get('dataBarang', [barangController::class, 'getAll']);
// Route::post('dataBarang', [barangController::class, 'createBarang']);
Route::post('dataBarang', [barangController::class, 'getID']);
Route::post('dataBarang', [barangController::class, 'createBarang']);
Route::put('dataBarang/{id}', [barangController::class, 'updateBarang']);
Route::delete('dataBarang/{id}', [barangController::class, 'deleteBarang']);

Route::get('dataKategori', [kategoriController::class, 'index']);

Route::get('dataUsers', [usersController::class, 'index']);

Route::get('dataTransaksi', [transaksiController::class, 'index']);

