<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.
use App\Http\Controllers\Admin\AktaLahirCrudController;
use App\Http\Controllers\Admin\AlamatIndonesiaCrudController;
use App\Http\Controllers\Admin\AlamatMesirCrudController;
use App\Http\Controllers\Admin\IzinTinggalCrudController;
use App\Http\Controllers\Admin\KepentinganCrudController;
use App\Http\Controllers\Admin\KeteranganBelajarCrudController;
use App\Http\Controllers\Admin\KeteranganLahirCrudController;
use App\Http\Controllers\Admin\LegalisirCrudController;
use App\Http\Controllers\Admin\MasterPnbpCrudController;
use App\Http\Controllers\Admin\MasukMesirCrudController;
use App\Http\Controllers\Admin\PengampunanCrudController;
use App\Http\Controllers\Admin\PindahKuliahIndonesiaCrudController;
use App\Http\Controllers\Admin\PindahKuliahLuarNegeriCrudController;
use App\Http\Controllers\Admin\TidakKeluarNegeriCrudController;
use App\Http\Controllers\Admin\VisaHajiCrudController;
use App\Http\Controllers\Admin\VisaUmrohCrudController;
use App\Http\Controllers\MasukMesirController;

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'role:admin'],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
//    Route::crud('contact', 'ContactCrudController');
    Route::crud('biodata', 'BiodataCrudController');

    Route::crud('izin-tinggal', 'IzinTinggalCrudController');
    Route::post('izin-tinggal/{id}/approve', [IzinTinggalCrudController::class, 'approve']);
    Route::post('izin-tinggal/{id}/decline', [IzinTinggalCrudController::class, 'decline']);
    Route::get('izin-tinggal/{id}/print', [IzinTinggalCrudController::class, 'print']);

    Route::crud('pendidikanmesir', 'PendidikanMesirCrudController');

    Route::crud('pengampunan', 'PengampunanCrudController');
    Route::post('pengampunan/{id}/approve', [PengampunanCrudController::class, 'approve']);
    Route::post('pengampunan/{id}/decline', [PengampunanCrudController::class, 'decline']);
    Route::get('pengampunan/{id}/print', [PengampunanCrudController::class, 'print']);

    Route::crud('alamat-mesir', 'AlamatMesirCrudController');
    Route::post('alamat-mesir/{id}/approve', [AlamatMesirCrudController::class, 'approve']);
    Route::post('alamat-mesir/{id}/decline', [AlamatMesirCrudController::class, 'decline']);
    Route::get('alamat-mesir/{id}/print', [AlamatMesirCrudController::class, 'print']);

    Route::crud('masuk-mesir', 'MasukMesirCrudController');
    Route::post('masuk-mesir/{id}/approve', [MasukMesirCrudController::class, 'approve']);
    Route::post('masuk-mesir/{id}/decline', [MasukMesirCrudController::class, 'decline']);
    Route::get('masuk-mesir/{id}/print', [MasukMesirCrudController::class, 'print']);

    Route::crud('visa-haji', 'VisaHajiCrudController');
    Route::post('visa-haji/{id}/approve', [VisaHajiCrudController::class, 'approve']);
    Route::post('visa-haji/{id}/decline', [VisaHajiCrudController::class, 'decline']);
    Route::get('visa-haji/{id}/print', [VisaHajiCrudController::class, 'print']);

    Route::crud('visa-umroh', 'VisaUmrohCrudController');
    Route::post('visa-umroh/{id}/approve', [VisaUmrohCrudController::class, 'approve']);
    Route::post('visa-umroh/{id}/decline', [VisaUmrohCrudController::class, 'decline']);
    Route::get('visa-umroh/{id}/print', [VisaUmrohCrudController::class, 'print']);

    Route::crud('alamat-indonesia', 'AlamatIndonesiaCrudController');
    Route::post('alamat-indonesia/{id}/approve', [AlamatIndonesiaCrudController::class, 'approve']);
    Route::post('alamat-indonesia/{id}/decline', [AlamatIndonesiaCrudController::class, 'decline']);
    Route::get('alamat-indonesia/{id}/print', [AlamatIndonesiaCrudController::class, 'print']);

    Route::crud('tidak-keluar-negeri', 'TidakKeluarNegeriCrudController');
    Route::post('tidak-keluar-negeri/{id}/approve', [TidakKeluarNegeriCrudController::class, 'approve']);
    Route::post('tidak-keluar-negeri/{id}/decline', [TidakKeluarNegeriCrudController::class, 'decline']);
    Route::get('tidak-keluar-negeri/{id}/print', [TidakKeluarNegeriCrudController::class, 'print']);

    Route::crud('kepentingan', 'KepentinganCrudController');
    Route::post('kepentingan/{id}/approve', [KepentinganCrudController::class, 'approve']);
    Route::post('kepentingan/{id}/decline', [KepentinganCrudController::class, 'decline']);
    Route::get('kepentingan/{id}/print', [KepentinganCrudController::class, 'print']);

    Route::crud('keterangan-lahir', 'KeteranganLahirCrudController');
    Route::post('keterangan-lahir/{id}/approve', [KeteranganLahirCrudController::class, 'approve']);
    Route::post('keterangan-lahir/{id}/decline', [KeteranganLahirCrudController::class, 'decline']);
    Route::get('keterangan-lahir/{id}/print', [KeteranganLahirCrudController::class, 'print']);

    Route::crud('legalisir', 'LegalisirCrudController');
    Route::post('legalisir/{id}/approve', [LegalisirCrudController::class, 'approve']);
    Route::post('legalisir/{id}/decline', [LegalisirCrudController::class, 'decline']);
    Route::get('legalisir/{id}/print', [LegalisirCrudController::class, 'print']);

    Route::crud('akta-lahir', 'AktaLahirCrudController');
    Route::post('akta-lahir/{id}/approve', [AktaLahirCrudController::class, 'approve']);
    Route::post('akta-lahir/{id}/decline', [AktaLahirCrudController::class, 'decline']);
    Route::get('akta-lahir/{id}/print', [AktaLahirCrudController::class, 'print']);
    Route::get('akta-lahir/{id}/delete', [AktaLahirCrudController::class, 'delete']);

    //Mahasiswa Routes
    Route::crud('keterangan-belajar', 'KeteranganBelajarCrudController');
    Route::post('keterangan-belajar/{id}/approve', [KeteranganBelajarCrudController::class, 'approve']);
    Route::post('keterangan-belajar/{id}/decline', [KeteranganBelajarCrudController::class, 'decline']);
    Route::get('keterangan-belajar/{id}/print', [KeteranganBelajarCrudController::class, 'print']);

    Route::crud('pindah-kuliah-indonesia', 'PindahKuliahIndonesiaCrudController');
    Route::post('pindah-kuliah-indonesia/{id}/approve', [PindahKuliahIndonesiaCrudController::class, 'approve']);
    Route::post('pindah-kuliah-indonesia/{id}/decline', [PindahKuliahIndonesiaCrudController::class, 'decline']);
    Route::get('pindah-kuliah-indonesia/{id}/print', [PindahKuliahIndonesiaCrudController::class, 'print']);

    Route::crud('pindah-kuliah-luar-negeri', 'PindahKuliahLuarNegeriCrudController');
    Route::post('pindah-kuliah-luar-negeri/{id}/approve', [PindahKuliahLuarNegeriCrudController::class, 'approve']);
    Route::post('pindah-kuliah-luar-negeri/{id}/decline', [PindahKuliahLuarNegeriCrudController::class, 'decline']);
    Route::get('pindah-kuliah-luar-negeri/{id}/print', [PindahKuliahLuarNegeriCrudController::class, 'print']);


    Route::crud('alamatindonesia', 'AlamatIndonesiaCrudController');
    Route::crud('alamatmesir', 'AlamatMesirCrudController');
    Route::crud('izintinggal', 'IzinTinggalCrudController');
    Route::crud('keteranganlahir', 'KeteranganLahirCrudController');
    Route::crud('masukmesir', 'MasukMesirCrudController');
    Route::crud('riwayatpendidikan', 'RiwayatPendidikanCrudController');
    Route::crud('tandatangan', 'TandaTanganCrudController');
    Route::crud('tidakkeluarnegeri', 'TidakKeluarNegeriCrudController');
    Route::crud('visahaji', 'VisaHajiCrudController');
    Route::crud('visaumroh', 'VisaUmrohCrudController');
    Route::crud('wilayah', 'WilayahCrudController');

    //ADMIN TRANSACTION

    Route::crud('master-pnbp', 'MasterPnbpCrudController');
    Route::post('master-pnbp/ajax', [MasterPnbpCrudController::class, 'ajax'])
    ->name('pnbp_ajax');
    Route::crud('pnbp', 'PnbpCrudController');

    Route::crud('aktalahir', 'AktaLahirCrudController');
    Route::crud('masterpnbp', 'MasterPnbpCrudController');
    Route::crud('keteranganbelajar', 'KeteranganBelajarCrudController');
    Route::crud('pindah-kuliah-indonesia', 'PindahKuliahIndonesiaCrudController');
    Route::crud('pindahkuliahindonesia', 'PindahKuliahIndonesiaCrudController');
}); // this should be the absolute last line of this file
