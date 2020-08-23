<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/jadwal');
});
Route::get('/login', function () {
    if(!auth()->check()) {
        return view('login');
    } else {
        return redirect('/jadwal');
    }
})->name('login');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/ruangan', 'RuanganController@index');
    Route::get('/ruangan/tambah', 'RuanganController@tambah');
    Route::get('/ruangan/edit/{id_ruangan}', 'RuanganController@edit');
    Route::get('/ruangan/hapus/{id_ruangan}', 'RuanganController@hapus');
    Route::post('/ruangan/simpantambah', 'RuanganController@simpantambah');
    Route::post('/ruangan/update', 'RuanganController@update');     
    
    Route::get('/jadwal', 'JadwalController@index');
    Route::get('/jadwal/tambah', 'JadwalController@tambah');
    Route::get('/jadwal/edit/{id_jadwal}', 'JadwalController@edit');
    Route::get('/jadwal/hapus/{id_jadwal}', 'JadwalController@hapus');
    Route::get('/jadwal/cetak/', 'JadwalController@cetak');
    Route::post('/jadwal/simpantambah', 'JadwalController@simpantambah');
    Route::post('/jadwal/update', 'JadwalController@update');
    Route::post('/jadwal/updateadmin', 'JadwalController@updateadmin');

    Route::get('/barang', 'BarangController@index');
    Route::get('/barang/tambah', 'BarangController@tambah');
    Route::get('/barang/edit/{id_barang}', 'BarangController@edit');
    Route::get('/barang/hapus/{id_barang}', 'BarangController@hapus');
    Route::post('/barang/simpantambah', 'BarangController@simpantambah');
    Route::post('/barang/update', 'BarangController@update');

    Route::get('/user', 'UserController@index');
    Route::get('/user/tambah', 'UserController@tambah');
    Route::get('/user/edit/{id_barang}', 'UserController@edit');
    Route::get('/user/hapus/{id_barang}', 'UserController@hapus');
    Route::post('/user/simpantambah', 'UserController@simpantambah');
    Route::post('/user/update', 'UserController@update');
});


