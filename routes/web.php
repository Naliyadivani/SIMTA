<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'ShowFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login_post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('dasbor', [MainController::class, 'dasbor'])->name('dasbor');

    Route::middleware(['auth'],'role_id:1')->group(function () {

        // Kelola Akun Pengguna
        Route::get('kadmin', [MainController::class, 'kadmin'])->name('kadmin');
        Route::get('kdosen', [MainController::class, 'kdosen'])->name('kdosen');
        Route::get('kmahasiswa', [MainController::class, 'kmahasiswa'])->name('kmahasiswa');

        Route::post('add_users', [MainController::class, 'add_users'])->name('add_users');
        Route::post('edit_users', [MainController::class, 'edit_users'])->name('edit_users');
        Route::post('delete_users', [MainController::class, 'delete_users'])->name('delete_users');
        Route::post('actshowusers', [MainController::class, 'actshowusers'])->name('actshowusers');
        Route::post('actphoto', [MainController::class, 'actphoto'])->name('actphoto');
        Route::post('upload_ttd', [MainController::class, 'upload_ttd'])->name('upload_ttd');        
        // End Kelola Akun Pengguna

        // Kelola Dosen
        Route::get('kpembimbing', [MainController::class, 'kpembimbing'])->name('kpembimbing');
        
        // End Kelola Dosen
    });

});