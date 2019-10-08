<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  //ユーザーIDを取得するために追加。これによりコントローラに認証情報（ユーザー情報）を扱う機能が追加されます

class CartItemController extends Controller
{
    public function store(Request $request)
    {
        CartItem::updateOrCreate(   //CartItem::updateOrCreate()は、レコードの登録と更新を兼ねるメソッド
            [
                'user_id' => Auth::id(),                 //ユーザーIDはAuthの機能を使い、Auth::id()で取得しています。
                'item_id' => $request->post('item_id'),  //商品IDと数量は$request->post('キー名')を使って取得します
            ],                                           //これによりHTMLのフォーム等(POSTメソッド)で送られた値を取得できます
            [
                'quantity' => \DB::raw('quantity + ' . $request->post('quantity') ), 
            ]                 //カラムに値を加算する`'quantity + '～`という文を、`\DB::raw()`に渡すことで、クエリ文字列を生成しています
        );
        return redirect('items/product_list')->with('flash_message', 'カートに追加しました');
        //処理が終わったらreturn redirect('items/product_list')で商品一覧ページに戻るようにしています
        //with()に指定した引数の値をセッションデータに保存したうえでリダイレクトします
    }
    
    public function index(Request $request)
       /* カート内の商品データを読み込んで、ビューに渡す処理を追加します
          $cartitems = CartItem::select('cart_items/*', 'items.name', 'items.amount')では
          検索結果に含めるカラムを指定しています。'cart_items/*'はカートのすべてのカラム
          items.name、items.amountはそれぞれ商品データの商品名と価格を指定しています。*/
    {   $cartitems = CartItem::select('cart_items/*', 'items.name', 'items.amount')
             ->where('user_id', Auth::id()) //←ではログイン中のユーザーのユーザーIDをキーにしてカート内の商品を検索しています。                            
             ->join('items', 'items.id', '=', 'cart_items.item_id') //←でcart_itemsテーブルとitemsテーブルを結合しています,cart_itemsテーブルは商品のID(cart_items.item_id)しか持っていないので、cart_items.item_idをキーにしてitemsテーブルから商品名と価格を取得できるようにしています
             ->get();                                               //最後にget()で検索結果を取得し、ビューに渡しています
             
             /*カート内の商品の合計金額を計算する*/
             $subtotal = 0;
             foreach($cartitems as $cartitem){
                 $subtotal += $cartitem->amout * $cartitem->quantity;
             }
             
        return view('cartitem/index', ['cartitems' => $cartitems]);
    }
}