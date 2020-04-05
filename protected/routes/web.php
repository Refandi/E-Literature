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
    return view('User/tes');
});


//RESOURCE
Route::resource('user', 'UserController');
Route::resource('kategori', 'KategoriController');
Route::resource('jenis-buku', 'JenisBukuController');
Route::resource('pengarang', 'PengarangController');
Route::resource('penerbit', 'PenerbitController');
Route::resource('tahun-terbit', 'TahunTerbitController');


//Datatable
Route::get('/datatable/user', 'UserController@datatable')->name('datatable_user');
Route::get('/datatable/jenis-buku', 'JenisBukuController@datatable')->name('datatable_jenis_buku');
Route::get('/datatable/pengarang', 'PengarangController@datatable')->name('datatable_pengarang');
Route::get('/datatable/penerbit', 'PenerbitController@datatable')->name('datatable_penerbit');
Route::get('/datatable/tahun-terbit', 'TahunTerbitController@datatable')->name('datatable_tahun_terbit');
