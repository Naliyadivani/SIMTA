<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PDFController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'ShowFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login_post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('dasbor', [MainController::class, 'dasbor'])->name('dasbor');

    Route::get('showpdfadmin', [MainController::class, 'showpdfadmin'])->name('showpdfadmin');
    Route::get('pdfadmin', [MainController::class, 'pdfadmin'])->name('pdfadmin');

    Route::get('showpdfmhslogbimbingan', [MainController::class, 'showpdfmhslogbimbingan'])->name('showpdfmhslogbimbingan');
    Route::get('actionpdfmhslogbimbingan', [MainController::class, 'actionpdfmhslogbimbingan'])->name('actionpdfmhslogbimbingan');
    Route::get('pdfmhslogbimbingan', [MainController::class, 'pdfmhslogbimbingan'])->name('pdfmhslogbimbingan');

    Route::get('showpdfmhssidangta', [MainController::class, 'showpdfmhssidangta'])->name('showpdfmhssidangta');
    Route::get('pdfmhssidangta', [MainController::class, 'pdfmhssidangta'])->name('pdfmhssidangta');


    Route::middleware(['auth'],'role_id:1')->group(function () {

        // Kelola Akun Pengguna
        Route::get('kadmin', [AdminController::class, 'kadmin'])->name('kadmin');
        Route::get('kdosen', [AdminController::class, 'kdosen'])->name('kdosen');
        Route::get('kmahasiswa', [AdminController::class, 'kmahasiswa'])->name('kmahasiswa');

        Route::post('add_users', [AdminController::class, 'add_users'])->name('add_users');
        Route::post('edit_users', [AdminController::class, 'edit_users'])->name('edit_users');
        Route::post('delete_users', [AdminController::class, 'delete_users'])->name('delete_users');
        Route::post('actshowusers', [AdminController::class, 'actshowusers'])->name('actshowusers');
        Route::post('actphoto', [AdminController::class, 'actphoto'])->name('actphoto');
        Route::post('upload_ttd', [AdminController::class, 'upload_ttd'])->name('upload_ttd');
        // End Kelola Akun Pengguna

        // Kelola Dosen
        Route::get('kpembimbing', [AdminController::class, 'kpembimbing'])->name('kpembimbing');

        Route::post('add_setting_dosen', [AdminController::class, 'add_setting_dosen'])->name('add_setting_dosen');
        Route::post('edit_kelola_dospem', [AdminController::class, 'edit_kelola_dospem'])->name('edit_kelola_dospem');
        Route::post('actshowkeloladospem', [AdminController::class, 'actshowkeloladospem'])->name('actshowkeloladospem');
        Route::post('delete_kelola_dospem', [AdminController::class, 'delete_kelola_dospem'])->name('delete_kelola_dospem');
        // End Kelola Dosen

        // Rubrik penilaian
        Route::get('rb_penilaian', [AdminController::class, 'rb_penilaian'])->name('rb_penilaian');

        // End Rubrik Penilaian

        Route::get('admtes', [AdminController::class, 'admtes'])->name('admtes');
    });

    Route::middleware(['auth'],'role_id:2')->group(function () {

        // Log Bimbingan
        Route::get('dosenlogbimbingan', [DosenController::class, 'dosenlogbimbingan'])->name('dosenlogbimbingan');
        Route::get('detail_log_bimbingan_dosen', [DosenController::class, 'detail_log_bimbingan_dosen'])->name('detail_log_bimbingan_dosen');

        Route::post('show_log_bimbingan_dosen', [DosenController::class, 'show_log_bimbingan_dosen'])->name('show_log_bimbingan_dosen');
        Route::post('approved_log_bimbingan_dosen', [DosenController::class, 'approved_log_bimbingan_dosen'])->name('approved_log_bimbingan_dosen');
        Route::post('reject_log_bimbingan_dosen', [DosenController::class, 'reject_log_bimbingan_dosen'])->name('reject_log_bimbingan_dosen');
        // En Log Bimbingan

        // BA Seminar
        Route::get('ba_seminardosen', [DosenController::class, 'ba_seminardosen'])->name('ba_seminardosen');

        Route::post('show_ba_seminar_dosen', [DosenController::class, 'show_ba_seminar_dosen'])->name('show_ba_seminar_dosen');
        Route::post('approved_ba_seminar_dosen', [DosenController::class, 'approved_ba_seminar_dosen'])->name('approved_ba_seminar_dosen');
        Route::post('reject_ba_seminar_dosen', [DosenController::class, 'reject_ba_seminar_dosen'])->name('reject_ba_seminar_dosen');
        // BA Seminar

        // BA SIdang
        Route::get('ba_sidangdosen', [DosenController::class, 'ba_sidangdosen'])->name('ba_sidangdosen');

        Route::post('show_setting_dospem_dosen', [DosenController::class, 'show_setting_dospem_dosen'])->name('show_setting_dospem_dosen');
        Route::post('add_ba_sidang_ta_dosen', [DosenController::class, 'add_ba_sidang_ta_dosen'])->name('add_ba_sidang_ta_dosen');
        Route::post('show_ba_sidang_dosen', [DosenController::class, 'show_ba_sidang_dosen'])->name('show_ba_sidang_dosen');
        // End BA Sidang

        // RB Bimbingan
        Route::get('rb_bimbingandosen', [DosenController::class, 'rb_bimbingandosen'])->name('rb_bimbingandosen');

        Route::post('add_nilai_rb_sidang_dosen', [DosenController::class, 'add_nilai_rb_sidang_dosen'])->name('add_nilai_rb_sidang_dosen');
        Route::post('show_nilai_rb_sidang_dosen', [DosenController::class, 'show_nilai_rb_sidang_dosen'])->name('show_nilai_rb_sidang_dosen');
        // End RB Bimbingan

        // RB Ujian
        Route::get('rb_ujiandosen', [DosenController::class, 'rb_ujiandosen'])->name('rb_ujiandosen');

        Route::post('add_nilai_rb_uji_dosen', [DosenController::class, 'add_nilai_rb_uji_dosen'])->name('add_nilai_rb_uji_dosen');
        Route::post('show_nilai_rb_uji_dosen', [DosenController::class, 'show_nilai_rb_uji_dosen'])->name('show_nilai_rb_uji_dosen');
        // End RB Ujian

    });

    Route::middleware(['auth'],'role_id:3')->group(function () {

        // Log Bimbingan
        Route::get('mhslogbimbingan', [MahasiswaController::class, 'mhslogbimbingan'])->name('mhslogbimbingan');

        Route::post('add_log_bimbingan_mhs', [MahasiswaController::class, 'add_log_bimbingan_mhs'])->name('add_log_bimbingan_mhs');
        Route::post('delete_mhs_logbimbingan', [MahasiswaController::class, 'delete_mhs_logbimbingan'])->name('delete_mhs_logbimbingan');
        Route::post('show_log_bimbingan_mhs', [MahasiswaController::class, 'show_log_bimbingan_mhs'])->name('show_log_bimbingan_mhs');
        // En Log Bimbingan

        // BA Seminar
        Route::get('mhsbaseminar', [MahasiswaController::class, 'mhsbaseminar'])->name('mhsbaseminar');

        Route::post('add_ba_seminar_mhs', [MahasiswaController::class, 'add_ba_seminar_mhs'])->name('add_ba_seminar_mhs');
        Route::post('delete_mhs_ba_seminar', [MahasiswaController::class, 'delete_mhs_ba_seminar'])->name('delete_mhs_ba_seminar');
        Route::post('show_ba_seminar_mhs', [MahasiswaController::class, 'show_ba_seminar_mhs'])->name('show_ba_seminar_mhs');
        // End BA Seminar

        // BA Sidang TA
        Route::get('ba_sidangmhs', [MahasiswaController::class, 'ba_sidangmhs'])->name('ba_sidangmhs');

        Route::post('show_setting_dospem_mhs', [MahasiswaController::class, 'show_setting_dospem_mhs'])->name('show_setting_dospem_mhs');
        Route::post('show_ba_sidang_mhs', [MahasiswaController::class, 'show_ba_sidang_mhs'])->name('show_ba_sidang_mhs');
        //End BA SIdang TA
    });
});
