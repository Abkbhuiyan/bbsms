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

//Route::get('bloodBank/','BloodBankController@index')->name('bloodBank.index');
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');
    Route::resource('user', 'UserController');
    Route::get('bloodBank/requests','BloodBankController@requests')->name('bloodBank.requests');
    Route::put('bloodBank/updateRequest/{bloodBank}','BloodBankController@updateRequest')->name('bloodBank.updateRequest');
    Route::resource('bloodBank','BloodBankController');

    Route::get('bloodDonor/requests','BloodDonorController@requests')->name('bloodDonor.requests');
    Route::put('bloodDonor/updateRequest/{bloodDonor}','BloodDonorController@updateRequest')->name('bloodDonor.updateRequest');
    Route::resource('bloodDonor','BloodDonorController');

});

