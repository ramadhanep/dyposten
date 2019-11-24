<?php

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
    return redirect()->route('home');
});

Auth::routes();

Route::group(["middleware" => "auth"], function(){
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::put('profile/{id}', 'ProfileController@update')->name('profileUpdate');
});
Route::group(["middleware" => ["role.adminUtama","auth"]], function(){
    Route::resource("informasiToko", "AppController\InformasiTokoController");
    Route::resource("users", "AppController\UserController");
});
Route::group(["middleware" => ["role.adminGudang","auth"]], function(){
    Route::resource("currencies", "AppController\CurrencyController");
    Route::resource("ppn", "AppController\PPNController");
    Route::resource("units", "AppController\UnitController");
    Route::resource("persentaseKeuntungan", "AppController\PersentaseKeuntunganController");
    Route::resource("bahan", "AppController\BahanController");
    Route::resource("kategoriProduk", "AppController\KategoriController");
    Route::resource("produk", "AppController\ProdukController");
    Route::resource("produkKosong", "AppController\ProdukKosongController");
    Route::get('produkMasuk', 'AppController\ProdukMasukController@index')->name('produkMasuk');
});
Route::group(["middleware" => ["role.kasir","auth"]], function(){
    Route::resource('transaksi', 'AppController\CartController');
    Route::get('transaksiClean', 'AppController\CartController@transaksiClean')->name('transaksiClean');
    Route::resource('checkout', 'AppController\CheckoutController');
    Route::resource('invoice', 'AppController\InvoiceController');
});

Route::group(["prefix" => "print"], function(){
    Route::get('users', 'AppController\UserController@print')->name("printUsers");

    Route::get('kategoriProduk', 'AppController\KategoriController@print')->name("printKategoriProduk");
    Route::get('produkMasuk', 'AppController\ProdukMasukController@print')->name("printProdukMasuk");
    Route::get('produkKosong', 'AppController\ProdukKosongController@print')->name("printProdukKosong");

    Route::get('riwayatTransaksi', 'AppController\InvoiceController@print')->name("printRiwayatTransaksi");
});
