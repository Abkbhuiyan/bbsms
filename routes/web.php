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
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'welcome');
Auth::routes();
Route::get('/login/seeker', 'Auth\LoginController@showSeekerLoginForm');
Route::post('/login/seeker', 'Auth\LoginController@seekerLogin');

Route::get('/signOut','Auth\LoginController@allLogout')->middleware('auth');
///blood bank routes
Route::get('/bloodBank/newBloodBank', 'BloodBank\BloodBankController@create')->name('bloodBank.new');
Route::post('/bloodBank/newBloodBank', 'BloodBank\BloodBankController@store')->name('bloodBank.save');
Route::get('/login/bb', 'Auth\LoginController@showBloodBankLoginForm')->name('bloodBank.login');
Route::post('/login/bb', 'Auth\LoginController@bloodBankLogin');
Route::middleware('auth:bb')->prefix('bloodBank')->namespace('BloodBank')->group(function () {
    Route::get('/', function () {
        return view('bloodBanks.dashboard');
    })->name('bloodBank.dashboard');
    ///admin manipulation routes
    Route::resource('bloodBank', 'BloodBankController');
});

//admin routes
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::middleware('auth:admin')->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admins.admin.dashboard');
    })->name('admin.dashboard');
    ///admin manipulation routes
    Route::resource('user', 'AdminController');
    ///blood bank manipulation routes
    Route::get('bloodBank/requests','BloodBankController@requests')->name('bloodBank.requests');
    Route::get('bloodBank/rejected','BloodBankController@rejectedBloodBanks')->name('bloodBank.rejects');
    Route::put('bloodBank/updateRequest/{bloodBank}','BloodBankController@updateRequest')->name('bloodBank.updateRequest');
    Route::get('bloodBank/searchByName}','BloodBankController@searchByName')->name('bloodBank.searchByName');
    Route::get('bloodBank/searchByReg}','BloodBankController@searchByReg')->name('bloodBank.searchByReg');
    Route::resource('bloodBank','BloodBankController');
    ///blood donors manipulation routes
    Route::get('bloodDonor/requests','BloodDonorController@requests')->name('bloodDonor.requests');
    Route::get('bloodDonor/rejected','BloodDonorController@rejectedDonors')->name('bloodDonor.rejects');
    Route::put('bloodDonor/updateRequest/{bloodDonor}','BloodDonorController@updateRequest')->name('bloodDonor.updateRequest');
    Route::resource('bloodDonor','BloodDonorController');
    ///
    Route::get('voluntaryOrganization/requests','VoluntaryOrganizationController@requests')->name('voluntaryOrganization.requests');
    Route::get('voluntaryOrganization/rejected','VoluntaryOrganizationController@rejectedVOrgs')->name('voluntaryOrganization.rejects');
    Route::put('voluntaryOrganization/updateRequest/{voluntaryOrganization}','VoluntaryOrganizationController@updateRequest')->name('voluntaryOrganization.updateRequest');
    Route::resource('voluntaryOrganization','VoluntaryOrganizationController');
});

//seeker routes
Route::middleware('auth:seeker')->get('/seeker', function(){
    return view('bloodSeeker.dashboard');
});

///
///
 Route::middleware('auth')->prefix('donor')->namespace('Donor')->group(function () {
     Route::get('/',function(){
         return view('bloodDonor.dashboard');
     });
 });

