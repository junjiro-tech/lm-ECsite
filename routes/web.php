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
Route::get('register/verify/{token}', 'Auth\RegisterController@showForm');

Route::post('register/provisional_register', 'Auth\RegisterController@provisional_register')->name('provisional_register');
Route::post('register/complete', 'Auth\RegisterController@complete')->name('register_complete');


Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/confirm', 'ContactController@confirm')->name('contact_confirm');   //nameに書いてる名前がviewの名前になる
Route::post('contact/complete', 'ContactController@complete')->name('contact_complete');


Route::get('/', 'top_page_controller@index')->name('top_page');
Route::get('search', 'top_page_controller@search')->name('search');
Route::get('loged_top_page', 'top_page_controller@loged')->name('loged_top_page');
Route::get('hyouki', 'top_page_controller@hyouki')->name('hyouki');
Route::get('privacy', 'top_page_controller@privacy')->name('privacy');
Route::post('cart', 'top_page_controller@cart')->name('cart');


Route::post('/cartitem/add', 'CartItemController@store')->name('cartitem'); //これで商品一覧に「カートに追加」のボタンが表示されて、押したらカートに追加されるようになる
Route::get('/cartitem', 'CartItemController@index')->name('cartitem_view');
Route::delete('/cartitem/', 'CartItemController@destroy')->name('cartitem_delete');
Route::put('/cartitem/', 'CartItemController@update')->name('cartitem_update');

Route::get('/buy', 'BuyController@index');
Route::post('/buy', 'BuyController@store');

Route::get('items/index', 'ItemController@index')->name('product_list');
Route::get('/items/{item}', 'ItemController@show')->name('product_details');   //product_details=商品詳細

// Admin認証不要
Route::group(['prefix' => 'admin'], function() {
    Route::get('login', 'Admin\LoginController@index')->name('morino_to');
});

//Adminログイン後
// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('images/create', 'Admin\ImagesController@add');
    Route::post('images/create', 'Admin\ImagesController@create')->name('item_regi');  //images/createで入力した内容をデータベースへ保存
    Route::get('images/list', 'Admin\ImagesController@index')->name('item_list');
    Route::get('images/edit', 'Admin\ImagesController@edit')->name('item_edi');
    Route::post('images/edit', 'Admin\ImagesController@update')->name('item_upd');
    Route::get('images/delte', 'Admin\ImagesController@delete')->name('item_del');
// });

//ルート名index=取得するとstore=格納