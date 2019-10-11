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
Route::get('/', 'top_page_controller@index')->name('top_page');
Route::get('search', 'top_page_controller@search')->name('search');
Route::get('loged_top_page', 'top_page_controller@loged')->name('loged_top_page');
Route::get('hyouki', 'top_page_controller@hyouki')->name('hyouki');
Route::get('privacy', 'top_page_controller@privacy')->name('privacy');
Route::post('cart', 'top_page_controller@cart')->name('cart');

Route::post('register/confirm', 'RegisterController@confirm')->name('register_confirm');

Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/confirm', 'ContactController@confirm')->name('contact_confirm');   //nameに書いてる名前がviewの名前になる
Route::post('contact/complete', 'ContactController@complete')->name('contact_complete');


Route::get('items/product_list', 'ItemController@index')->name('product_list');
Route::get('/items/{item}', 'ItemController@show')->name('product_details');   //product_details=商品詳細


Route::post('/cartitem', 'CartItemController@store')->name('cartitem'); //これで商品一覧に「カートに追加」のボタンが表示されて、押したらカートに追加されるようになりました



//ルート名index=取得するとstore=格納