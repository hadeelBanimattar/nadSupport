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


//Route form displaying our form
Route::get('/', 'ContactsController@contactForm');
//Rout for submitting the form datat
Route::post('/storedata', 'ContactsController@storeData')->name('form.data');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
