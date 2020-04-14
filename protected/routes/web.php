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
use App\JenisBuku;
use App\Penerbit;
use App\Pengarang;
use App\TahunTerbit;


Route::get('/', function () {
    $jenis_buku = JenisBuku::all();
    $pengarang = Pengarang::all();
    $penerbit = Penerbit::all();
    $tahun_terbit = TahunTerbit::all();
    return view('welcome', compact('jenis_buku', 'pengarang', 'penerbit', 'tahun_terbit'));
});



// Route::get('/', 'KategoriController@index');


//RESOURCE
Route::resource('user', 'UserController');
Route::resource('kategori', 'KategoriController');
Route::resource('jenis-buku', 'JenisBukuController');
Route::resource('pengarang', 'PengarangController');
Route::resource('penerbit', 'PenerbitController');
Route::resource('tahun-terbit', 'TahunTerbitController');
Route::resource('buku', 'BukuController');


//Datatable
Route::get('/datatable/user', 'UserController@datatable')->name('datatable_user');
Route::get('/datatable/jenis-buku', 'JenisBukuController@datatable')->name('datatable_jenis_buku');
Route::get('/datatable/pengarang', 'PengarangController@datatable')->name('datatable_pengarang');
Route::get('/datatable/penerbit', 'PenerbitController@datatable')->name('datatable_penerbit');
Route::get('/datatable/tahun-terbit', 'TahunTerbitController@datatable')->name('datatable_tahun_terbit');
Route::get('/datatable/buku', 'BukuController@datatable')->name('datatable_buku');
Route::get('/datatable/welcome', 'KategoriController@datatable_welcome')->name('datatable_welcome');

//DOWNLOAD FILE
Route::get('/download-file/{id}', 'BukuController@download_pdf')->name('download.file');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
