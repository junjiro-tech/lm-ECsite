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
//トップページのリンク
Route::get('/', 'TopPageController@index')->name('top_page');
Route::get('search', 'TopPageController@search')->name('search');
Route::get('loged_top_page', 'TopPageController@loged')->name('loged_top_page');
Route::get('hyouki', 'TopPageController@hyouki')->name('hyouki');
Route::get('privacy', 'TopPageController@privacy')->name('privacy');
Route::post('cart', 'TopPageController@cart')->name('cart');

//商品一覧と詳細
Route::get('items/index', 'ItemController@index')->name('product_list');
Route::get('/items/{item}', 'ItemController@show')->name('product_details');   //product_details=商品詳細

//カートアイテム
Route::post('/cartitem/add', 'CartItemController@store')->name('cartitem'); //これで商品一覧に「カートに追加」のボタンが表示されて、押したらカートに追加されるようになる
Route::get('/cartitem', 'CartItemController@index')->name('cartitem_view');
Route::delete('/cartitem/', 'CartItemController@destroy')->name('cartitem_delete');
Route::put('/cartitem/', 'CartItemController@update')->name('cartitem_update');

//カートからログインして購入処理
Route::get('buylogin', 'Auth\LoginController@showBuyLoginForm');
Route::post('buylogin', 'Auth\LoginController@buylogin')->name('buylogin');

//ログイン済み購入処理
Route::get('/buy/index', 'BuyController@index');
Route::post('buy/index', 'BuyController@store')->name('regi_complete');

//非会員購入処理
Route::get('buy/guest/index', 'GuestBuyController@index')->name('guest_index');
Route::post('buy/guest/confirm', 'GuestBuyController@confirm')->name('guest_confirm');
Route::post('buy/guest/complete', 'GuestBuyController@complete')->name('guest_complete');

//決済処理
Route::post('/charge', 'HomeController@charge');

//購入後メール送信、在庫が15個以下になると管理者へメール送信
Route::get('buy/inventoryMail', 'MailController@index');

//stripe導入
Route::post('/pay', 'PaymentController@pay');

//会員登録フォーム
Route::get('register/verify/{token}', 'Auth\RegisterController@showForm');
Route::post('register/provisional_register', 'Auth\RegisterController@provisional_register')->name('provisional_register');
Route::post('register/complete', 'Auth\RegisterController@complete')->name('register_complete');

//お問い合わせフォーム
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/confirm', 'ContactController@confirm')->name('contact_confirm');   //nameに書いてる名前がviewの名前になる
Route::post('contact/complete', 'ContactController@complete')->name('contact_complete');


// Admin認証不要
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
    
});

//Adminログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    // Route::get('/home',      'Admin\HomeController@index')->name('admin.home');
    Route::get('images/create', 'Admin\ImagesController@add'); 
    Route::post('images/create', 'Admin\ImagesController@create')->name('item_regi');  //images/createで入力した内容をデータベースへ保存
    Route::get('images/list', 'Admin\ImagesController@index')->name('item_list');
    Route::get('images/edit', 'Admin\ImagesController@edit')->name('item_edi');
    Route::post('images/edit', 'Admin\ImagesController@update')->name('item_upd');
    Route::get('images/delte', 'Admin\ImagesController@delete')->name('item_del');
});


//ルート名index=取得するとstore=格納