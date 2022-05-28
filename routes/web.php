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

//Guide
Route::get('/register', 'giude\signupController@register')->name('register');
Route::post('/register', 'giude\signupController@storeUser1');
Route::get('/register2', 'giude\languageController@register2')->name('register2');
Route::post('/register2', 'giude\languageController@storeUser2');
Route::get('/login', 'giude\signupController@login')->name('login');
Route::post('/login', 'giude\signupController@authenticate');
Route::get('logout', 'giude\signupController@logout')->name('logout');
Route::get('/home', 'giude\signupController@home')->name('home');

//USER
Route::get('/register3', 'user\userController@register')->name('register3');
Route::post('/register3', 'user\userController@storeUser');
Route::get('/loginUser', 'user\userController@login')->name('loginUser');
Route::post('/loginUser', 'user\userController@authenticate');
Route::get('/userHome', 'user\userController@home')->name('userHome');

//company
Route::get('/addCompany', 'company\companyController@addCompany')->name('addCompany');
Route::post('/addCompany', 'company\companyController@storeCompany');






