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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/patient', 'HomeController@patient')->name('patient');
Route::post('/home', 'DoctorsController@addPrescription');
Route::get('/get/patients', 'DoctorsController@getPatients');
Route::get('/get/prescription/{id}', 'DoctorsController@getPrescription');
Route::get('/get/patient/{id}', 'DoctorsController@patientInfo');
Route::delete('/delete/prescription/{id}', 'DoctorsController@deletePrescription');
