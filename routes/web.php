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

//////// USER \\\\\\\
Route::resource('payment','PaymentController');
Route::get('payment-create/{id}','PaymentController@buat');
Route::get('my-room','userController@myroom');

//////// FRONTEND \\\\\\\
Route::get('/','FrontendController@cardkos'); // Homepage
Route::get('detail-kamar-kos/{id}','FrontendController@detailkos'); // Detail Kos
Route::get('sewa-kamar-kos/{id}','sewaController@index')->middleware('auth'); // Index Sewa Kos
Route::post('sewa-kamar-kos','sewaController@store'); // Proses sewa kamar kos