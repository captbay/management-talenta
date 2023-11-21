<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    // group and middleware backpack_auth() for role Dosen
    Route::group([
        'middleware' => ['checkRole:Dosen'],
    ], function () {
        Route::crud('dosen', 'DosenCrudController');
    });
    // group and middleware backpack_auth() for role Kepala Urusan Sumber Daya
    Route::group([
        'middleware' => ['checkRole:Kepala Urusan Sumber Daya'],
    ], function () {
        Route::crud('kepala-urusan-sumber-daya', 'KepalaUrusanSumberDayaCrudController');
    });
    // group and middleware backpack_auth() for role Ketua Kelompok Keahlian
    Route::group([
        'middleware' => ['checkRole:Ketua Kelompok Keahlian'],
    ], function () {
        Route::crud('ketua-kelompok-keahlian', 'KetuaKelompokKeahlianCrudController');
    });
    // group and middleware backpack_auth() for role Ketua Program Studi
    Route::group([
        'middleware' => ['checkRole:Ketua Program Studi'],
    ], function () {
        Route::crud('ketua-program-studi', 'KetuaProgramStudiCrudController');
    });
    // group and middleware backpack_auth() for role Pegawai
    Route::group([
        'middleware' => ['checkRole:Pegawai'],
    ], function () {
        Route::crud('pegawai', 'PegawaiCrudController');
    });
    // group and middleware backpack_auth() for role BidangII
    Route::group([
        'middleware' => ['checkRole:Bidang II'],
    ], function () {
        Route::crud('bidang-i-i', 'BidangIICrudController');
    });
    // Route::crud('bidang-i-i', 'BidangIICrudController');
    // Route::crud('user', 'UserCrudController');
    // Route::crud('dosen', 'DosenCrudController');
    // Route::crud('kepala-urusan-sumber-daya', 'KepalaUrusanSumberDayaCrudController');
    // Route::crud('ketua-kelompok-keahlian', 'KetuaKelompokKeahlianCrudController');
    // Route::crud('ketua-program-studi', 'KetuaProgramStudiCrudController');
    // Route::crud('pegawai', 'PegawaiCrudController');
}); // this should be the absolute last line of this file