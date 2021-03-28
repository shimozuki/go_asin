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

Route::get('/room/{slug}','Frontend\FrontendsController@showkamar'); //Show Kamar

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index');

  ////// PEMILIK \\\\\\
  Route::prefix('/pemilik')->middleware('role:Pemilik')->group(function () {
    Route::resource('kamar','Owner\KamarController'); //Data Kamar
    Route::get('profile','Owner\ProfileController@profile'); // Profile
    Route::put('payment-profile/{user_id}','Owner\ProfileController@payment_profile'); // Save Data Payment
  });


  ///// USER \\\\\
  Route::prefix('/user')->middleware('role:Pencari')->group(function () {
    Route::post('/transaction-room/{id}','User\TransactionController@store')->name('sewa.store'); // Proses save Room
    Route::get('room/{key}','User\TransactionController@detail_payment'); // Detail payment
    Route::put('konfirmasi-payment/{id}','User\TransactionController@update'); // Konfirmasi Payment
    Route::get('tagihan','User\TransactionController@tagihan');
  });

});

