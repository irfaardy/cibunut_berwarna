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

Route::get('/', 'LandingPageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/pengguna', 'PenggunaController@index')->name('pengguna');
Route::get('admin/pengguna/create', 'PenggunaController@create')->name('pengguna.create');
Route::get('admin/pengguna/edit/{id}', 'PenggunaController@edit')->name('pengguna.edit');
Route::post('admin/pengguna/save', 'PenggunaController@save')->name('pengguna.save');
Route::post('admin/pengguna/update', 'PenggunaController@update')->name('pengguna.update');

Route::get('admin/berita', 'BeritaController@index')->name('berita');
Route::get('admin/berita/create', 'BeritaController@create')->name('berita.create');
Route::get('admin/berita/edit/{id}', 'BeritaController@edit')->name('berita.edit');
Route::post('admin/berita/save', 'BeritaController@save')->name('berita.save');
Route::post('admin/berita/update', 'BeritaController@update')->name('berita.update');
Route::get('admin/berita/delete/{id}', 'BeritaController@delete')->name('berita.delete');


Route::get('admin/produk', 'ProdukController@index')->name('produk');
Route::get('admin/produk/create', 'ProdukController@create')->name('produk.create');
Route::get('admin/produk/edit/{id}', 'ProdukController@edit')->name('produk.edit');
Route::post('admin/produk/save', 'ProdukController@save')->name('produk.save');
Route::post('admin/produk/update', 'ProdukController@update')->name('produk.update');
Route::get('admin/produk/delete/{id}', 'ProdukController@delete')->name('produk.delete');


Route::get('admin/konten/header', 'KontenHeaderController@index');
Route::post('admin/konten/update', 'KontenHeaderController@update');

Route::get('admin/konten/about', 'KontenAboutController@index');
Route::post('admin/konten/update/about', 'KontenAboutController@update');
