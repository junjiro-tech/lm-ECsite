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

/*Route::get('/', function () {
    return view('welcome');

});*/
Auth::routes(); 
Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'NewsController@index');

Route::get('/', 'top_page_controller@index')->name('top_page');
Route::get('loged_top_page', 'top_page_controller@loged')->name('loged_top_page');
Route::get('hyouki', 'top_page_controller@hyouki')->name('hyouki');
Route::get('privacy', 'top_page_controller@privacy')->name('privacy');
route::get('contact', 'top_page_controller@contact')->name('contact');
Route::get('cart', 'top_page_controller@cart')->name('cart');

Route::get('contact', 'ContactsController@index')->name('contact');
Route::post('contact/confirm', 'ContactsController@confirm')->name('confirm');
Route::post('contact/complete', 'ContactsController@complete')->name('complete');