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

///// FRONTEND \\\\\
// Homepage
Route::get('/','Frontend\FrontendsController@homepage');
// Show Kamar
Route::get('/room/{slug}','Frontend\FrontendsController@showkamar');



Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index');

  ////// PEMILIK \\\\\\
  Route::prefix('/pemilik')->middleware('role:Pemilik')->group(function () {
    Route::resource('kamar','Owner\KamarController');
  });


  ///// USER \\\\\
  Route::prefix('/user')->middleware('role:Pencari')->group(function () {
    Route::post('/transaction/{id}','User\TransactionController@store');
  });

});


// Route::resource('kamar','KamarController');
// Route::get('payment-detail-owner/{id}/user/{user_id}','ownerController@detailPayment');
// Route::get('setujui-pembayaran','ownerController@setujuiPayment');
//
// Route::get('dokumentasi-rilis','ownerController@doc');

// //////// USER \\\\\\\
// Route::resource('payment','PaymentController');
// Route::get('payment-create/{id}','PaymentController@buat');
// Route::get('payment-booking-create/{id}','PaymentController@bookPayment');
// Route::get('my-room','userController@myroom');

// Route::get('get-nama-kamar','sewaController@namakamar'); // Get nama kamar
// Route::get('get-harga-kamar','sewaController@hargakamar'); // Get harga kamar
// Route::get('get-nama-bank','sewaController@namabank'); // Get nama bank
// Route::get('get-no-rek','sewaController@norek'); // Get no rek
// Route::get('get-email-pemilik','sewaController@emailpemilik'); // Get Email Pemilik
