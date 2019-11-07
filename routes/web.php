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
Route::post('register/confirm', 'Auth\RegisterController@confirm')->name('register_confirm');
Route::post('register/complete', 'Auth\RegisterController@complete')->name('register_complete');


Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/confirm', 'ContactController@confirm')->name('contact_confirm');   //nameに書いてる名前がviewの名前になる
Route::post('contact/complete', 'ContactController@complete')->name('contact_complete');


Route::get('/home', 'HomeController@index')->name('home');
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

Route::get('admin/login', 'Admin\MorinoController@index')->name('morino_to');

Route::get('items/index', 'ItemController@index')->name('product_list');
Route::get('/items/{item}', 'ItemController@show')->name('product_details');   //product_details=商品詳細


Route::get('images/create', 'ImagesController@add');                           //images/create表示
Route::post('images/create', 'ImagesController@create')->name('item_regi');  //images/createで入力した内容をデータベースへ保存
Route::get('images/list', 'ImagesController@index')->name('item_list');
Route::get('images/edit', 'ImagesController@edit')->name('item_edi');
Route::post('images/edit', 'ImagesController@update')->name('item_upd');
Route::get('images/delte', 'ImagesController@delete')->name('item_del');
// Route::get('/images', 'ImagesController@index')->name('item_edit');
// Route::get('/images/new', 'ImagesController@store');
// Route::post('/images', 'ImagesController@create');
// Route::get('images/{filename}', 'ImagesController@show');
// Route::delete('/images/{filename}', 'ImagesController@destroy');


//ルート名index=取得するとstore=格納