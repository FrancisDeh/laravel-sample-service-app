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



//Authenticattion routes
Auth::routes();

//resource routes
Route::resource('services', 'ServiceController');
Route::resource('service_users', 'ServiceUserController');
Route::resource('files', 'FileUploadController');

//Get Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'ServiceController@index')->name('services.index');
Route::get('/export/service/users/excel', 'ServiceUserController@exportUsersToExcel')->name('service_users.export.excel');
Route::get('/export/service/users/pdf', 'ServiceUserController@exportUsersToPdf')->name('service_users.export.pdf');

