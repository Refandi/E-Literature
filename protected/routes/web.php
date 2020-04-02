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


//Datatable
Route::get('/datatable/user', 'UserController@datatable')->name('datatable_user');
Route::get('/datatable/kategori', 'KategoriController@datatable')->name('datatable_kategori');
