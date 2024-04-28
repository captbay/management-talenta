<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangIIController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KepalaUrusanSumberDayaController;
use App\Http\Controllers\KetuaKelompokKeahlianController;
use App\Http\Controllers\KetuaProgramStudiController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    // Route::post('register', [AuthController::class, 'register']);
});

Route::group(['prefix' => 'auth', 'middleware' => ['auth:sanctum']], function () {
    // get data user login
    Route::get('user', [AuthController::class, 'userLogin']);
    // update data user login
    Route::put('user', [AuthController::class, 'updateUserLogin']);
    //logout
    Route::get('logout', [AuthController::class, 'logout']);
});

// dosen
Route::group(['prefix' => 'dosen'], function () {
    Route::get('/', [DosenController::class, 'index']);
    Route::get('/{id}', [DosenController::class, 'show']);
    Route::post('/', [DosenController::class, 'store']);
    Route::put('/{id}', [DosenController::class, 'update']);
    Route::delete('/{id}', [DosenController::class, 'destroy']);
});

// graph
Route::group(['prefix' => 'graph'], function () {
    // dosen
    Route::get('/count-prodi', [DosenController::class, 'countProdi']);
    Route::get('/count-kelompok-keahlian', [DosenController::class, 'countKelompokKeahlian']);

    // pegawai
    Route::get('/count-jabatan-fungsional', [PegawaiController::class, 'countJabatanFungsional']);
    Route::get('/count-status', [PegawaiController::class, 'countStatus']);
});

// pegawai
Route::group(['prefix' => 'pegawai'], function () {
    Route::get('/', [PegawaiController::class, 'index']);
    Route::get('/{id}', [PegawaiController::class, 'show']);
    Route::post('/', [PegawaiController::class, 'store']);
    Route::put('/{id}', [PegawaiController::class, 'update']);
    Route::delete('/{id}', [PegawaiController::class, 'destroy']);
});

// kepala-sdm
Route::group(['prefix' => 'kepala-sdm'], function () {
    Route::get('/', [KepalaUrusanSumberDayaController::class, 'index']);
    Route::get('/{id}', [KepalaUrusanSumberDayaController::class, 'show']);
    Route::post('/', [KepalaUrusanSumberDayaController::class, 'store']);
    Route::put('/{id}', [KepalaUrusanSumberDayaController::class, 'update']);
    Route::delete('/{id}', [KepalaUrusanSumberDayaController::class, 'destroy']);
});

// ketua-kelompok-keahlian
Route::group(['prefix' => 'ketua-kelompok-keahlian'], function () {
    Route::get('/', [KetuaKelompokKeahlianController::class, 'index']);
    Route::get('/{id}', [KetuaKelompokKeahlianController::class, 'show']);
    Route::post('/', [KetuaKelompokKeahlianController::class, 'store']);
    Route::put('/{id}', [KetuaKelompokKeahlianController::class, 'update']);
    Route::delete('/{id}', [KetuaKelompokKeahlianController::class, 'destroy']);
});

// ketua-program-studi
Route::group(['prefix' => 'ketua-program-studi'], function () {
    Route::get('/', [KetuaProgramStudiController::class, 'index']);
    Route::get('/{id}', [KetuaProgramStudiController::class, 'show']);
    Route::post('/', [KetuaProgramStudiController::class, 'store']);
    Route::put('/{id}', [KetuaProgramStudiController::class, 'update']);
    Route::delete('/{id}', [KetuaProgramStudiController::class, 'destroy']);
});

// bidang-ii
Route::group(['prefix' => 'bidang-ii'], function () {
    Route::get('/', [BidangIIController::class, 'index']);
    Route::get('/{id}', [BidangIIController::class, 'show']);
    Route::post('/', [BidangIIController::class, 'store']);
    Route::put('/{id}', [BidangIIController::class, 'update']);
    Route::delete('/{id}', [BidangIIController::class, 'destroy']);
});
