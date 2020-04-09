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


Auth::routes();

Route::get('/dashboard', 'HomeController@index')->middleware('auth');

////// OWNER \\\\\\
Route::resource('owner','ownerController');
Route::resource('kamar','KamarController');
Route::get('payment-detail-owner/{id}/user/{user_id}','ownerController@detailPayment');
Route::get('setujui-pembayaran','ownerController@setujuiPayment');
Route::get('get-nama-provinsi','KamarController@namaProvinsi');
Route::get('dokumentasi-rilis','ownerController@doc');

//////// USER \\\\\\\
Route::resource('payment','PaymentController');
Route::get('payment-create/{id}','PaymentController@buat');
Route::get('payment-booking-create/{id}','PaymentController@bookPayment');
Route::get('my-room','userController@myroom');

Route::get('get-nama-kamar','sewaController@namakamar'); // Get nama kamar
Route::get('get-harga-kamar','sewaController@hargakamar'); // Get harga kamar
Route::get('get-nama-bank','sewaController@namabank'); // Get nama bank
Route::get('get-no-rek','sewaController@norek'); // Get no rek
Route::get('get-email-pemilik','sewaController@emailpemilik'); // Get Email Pemilik

//////// FRONTEND \\\\\\\
Route::get('/','FrontendController@cardkos'); // Homepage
Route::get('detail-kamar-kos/{id}/{kamar}','FrontendController@detailkos'); // Detail Kos
Route::get('sewa-kamar-kos/{id}/{kamar}','sewaController@index')->middleware('auth'); // Index Sewa Kos
Route::post('sewa-kamar-kos','sewaController@store'); // Proses sewa kamar kos
Route::get('booking-kamar/{id}/{kamar}','sewaController@book')->middleware('auth'); // Index Booking
Route::post('booking-kamar','sewaController@prosesBooking'); // Proses Booking