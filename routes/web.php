<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\PengembanganController;


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

Route::get('/', [PageController::class,'index']) -> name('index') -> middleware('guest');
Route::get('/login', [PageController::class,'formlogin']) -> name('login') -> middleware('guest');
Route::post('/loginprocess', [PageController::class,'loginprocess']) -> name('loginprocess') -> middleware('guest');

Route::group(['middleware' => ['auth']], function()
{
    Route::get('/dashboard', [PageController::class,'dashboard']) -> name('dashboard');
    Route::get('/logout', [PageController::class,'logout']) -> name('logout');
    Route::get('/pegawai', [PegawaiController::class,'pegawai']) -> name('pegawai');
    Route::get('/profile', [UserController::class,'profile']) -> name('profile');
    Route::get('/form_ubah_password', [UserController::class,'form_ubah_password']) -> name('form_ubah_password');
    Route::post('/process_ubah_password', [UserController::class,'process_ubah_password']) -> name('process_ubah_password');
});

Route::group(['middleware' => ['auth', 'leveluser:1']], function()
{
    // data user
    Route::get('/manageuser', [UserController::class,'manageuser']) -> name('manageuser');
    Route::get('/form_add_user', [UserController::class,'form_add_user']) -> name('form_add_user');
    Route::post('/process_add_user', [UserController::class,'process_add_user']) -> name('process_add_user');
    Route::post('/form_edit_user', [UserController::class,'form_edit_user']) -> name('form_edit_user');
    Route::post('/process_edit_user', [UserController::class,'process_edit_user']) -> name('process_edit_user');
    Route::post('/delete_user', [UserController::class,'delete_user']) -> name('delete_user');
    Route::post('/detail_pegawai', [UserController::class,'detail_pegawai']) -> name('detail_pegawai');

    //data kompetensi
    Route::get('/add_kompetensi', [UserController::class,'add_kompetensi']) -> name('add_kompetensi');
    Route::post('/proses_add_kompetensi', [UserController::class,'proses_add_kompetensi']) -> name('proses_add_kompetensi');

    //data usulan
    Route::get('/usulan_input', [UsulanController::class,'usulan_input']) -> name('usulan_input');
    Route::post('/process_input_usulan', [UsulanController::class,'process_input_usulan']) -> name('process_input_usulan');

    Route::get('/usulan', [UsulanController::class,'usulan']) -> name('usulan');
    Route::post('/process_add_usulan', [UsulanController::class,'process_add_usulan']) -> name('process_add_usulan');
    Route::post('/delete_usulan', [UsulanController::class,'delete_usulan']) -> name('delete_usulan');

    // data pengembangan kompetensi
    Route::get('/diklat_kepeminpinan', [PengembanganController::class,'diklat_kepeminpinan']) -> name('diklat_kepeminpinan');
    Route::get('/diklat_fungsional', [PengembanganController::class,'diklat_fungsional']) -> name('diklat_fungsional');
    Route::get('/diklat_teknis', [PengembanganController::class,'diklat_teknis']) -> name('diklat_teknis');
    Route::get('/bimtek', [PengembanganController::class,'bimtek']) -> name('bimtek');

});
