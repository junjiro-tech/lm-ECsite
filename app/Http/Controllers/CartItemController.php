<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  //ユーザーIDを取得するために追加。これによりコントローラに認証情報（ユーザー情報）を扱う機能が追加されます
use App\CartItem;
use App\Item;
use App\Uuid;
use Illuminate\Support\Facades\Cookie;
use DB;

class CartItemController extends Controller
{
    
    //store()メソッドが呼ばれると、データベースのcart_itemsテーブルに新しいレコードが追加される
    public function store(Request $request)  
    {
        //debaugbar nullならなぜか調べる
        
                $cookie = Cookie::get('uuid'); //Cookie::getでcookie取得
                    
            if ( !Auth::check())  //ログインしていない人で
            {
                
                //cookieがあれば、かつカートアイテムのguest_idに$cookieがあれば
                // if( $cookie != null && CartItem::where('guest_id', $cookie) )
                // {
                //     $cart_item = Cartitem::where('guest_id', $cookie)->first(); //first()は最初の一件のみ取得
                
                    //cookieがなければ
                if ( is_null($cookie)) {  //この変数がnullかどうか
                $uuid = new Uuid();
                //time()を設定しなかった時は、ブラウザを閉じた時点でクッキー破棄となる。また、クッキーを現在時点より前に設定するとその時点で破棄となる
                $minites = 60 * 24;
                Cookie::queue('uuid', $uuid->uuid, $minites);  //$cookieに新規idを保存 setcookie(第1引数:'クッキーの名前'、第2引数:クッキーの値、第3引数:有効期限)
                                  //'uuid'名前とばれないような名前に後で変更
                $cookie = $uuid->uuid;                  
                }
                
                
                
                CartItem::updateOrCreate(   //CartItem::updateOrCreate()は、レコードの登録と更新を兼ねるメソッド
                [                                            //新しい行を追加するために「ﾕｰｻﾞｰID」「商品ID」「数量」を指定する
                    'guest_id' => $cookie,                   //guest_idはpost使いitemのidを取得
                    'item_id' => $request->post('item_id'),  //商品IDと数量は$request->post('キー名')を使って取得します
                ],                                           //->postこれによりHTMLのフォーム等(POSTメソッド)で送られた値を取得できます
                [
                    'quantity' => \DB::raw('quantity + ' . $request->post('quantity') ), 
                ]                 //カラムに値を加算する`'quantity + '～`という文を、`\DB::raw()`に渡すことで、クエリ文字列を生成している
                );
            
            
            } else {
    
            
                CartItem::updateOrCreate(   //CartItem::updateOrCreate()は、レコードの登録と更新を兼ねるメソッド
                    [                                            //新しい行を追加するために「ﾕｰｻﾞｰID」「商品ID」「数量」を指定する
                        'user_id' => Auth::id(),                 //ユーザーIDはAuthの機能を使い、Auth::id()でログイン中のユーザー情報から取得している。
                        'item_id' => $request->post('item_id'),  //商品IDと数量は$request->post('キー名')を使って取得します
                    ],                                           //->postこれによりHTMLのフォーム等(POSTメソッド)で送られた値を取得できます
                    [
                        'quantity' => \DB::raw('quantity + ' . $request->post('quantity') ), 
                    ]                 //カラムに値を加算する`'quantity + '～`という文を、`\DB::raw()`に渡すことで、クエリ文字列を生成している
                );
            }
            
            
            return redirect('items/index')->with('flash_message', 'カートに追加しました');
            //処理が終わったらreturn redirect('items/index')で商品一覧ページに戻るようにしている
            //with()に指定した引数の値をセッションデータに保存したうえでリダイレクトする

    }
    
    
    
        /*↓カート内の商品データを読み込んで、ビューに渡す処理を追加
          $cartitems = CartItem::select('cart_items', 'items.name', 'items.amount')では
          検索結果に含めるカラムを指定しています。'cart_items'はカートのすべてのカラム
          items.name、items.amountはそれぞれ商品データの商品名と価格を指定しています
          
          CartItemsTableでhasOneを使い、CartItemとItemを一対一で関連づけておくと(mynewsのUserとProfileと同様に）
          以下のような記述で、cartitemからitemのデータを参照できます。ただ大人数がアクセスした時にitemの情報を全て拾ってくるのでメモリを多く
          使用し重くなってしまうので、itemsのidだけを取ってきたい時にはjoinで1つだけ使った方がよい
          $cartitem->$item->item_name ←ではログイン中のユーザーのユーザーIDをキーにしてカート内の商品を検索しています。*/
    public function index(Request $request)
        
    {   
             $cookie = Cookie::get('uuid'); //Cookie::getでcookie取得
             
             //ログイン中であれば
             if( Auth::check() )
             {
                 $cartitems = CartItem::select(DB::raw('sum(quantity) as quantity, cart_items.item_id as item_id, items.item_name as item_name, items.amount as amount'))  //select関数は('aテーブル.bカラム')を取ってくるという時に使える
                     ->where('user_id', Auth::id())                      
                     ->join('items', 'cart_items.item_id', '=', 'items.id') //join('itemテーブルから', 'cart_itemsのitem_idをキーにてしてitem.idの情報を取得している。cart_itemsテーブルとitemsテーブルを結合しています,cart_itemsテーブルは商品のID(cart_items.item_id)しか持っていないので、cart_items.item_idをキーにしてitemsテーブルから商品名と価格を取得できるようにしています
                     ->groupBy('cart_items.item_id', 'items.amount', 'items.item_name') //'テーブル名.カラム名'
                     ->get();                                               //最後にget()で検索結果を取得し、ビューに渡しています
                
             } else {
                 
                 $cartitems = CartItem::select(DB::raw('sum(quantity) as quantity, cart_items.item_id as item_id, items.item_name as item_name, items.amount as amount'))
                 ->where('guest_id', $cookie)
                 ->join('items', 'cart_items.item_id', '=', 'items.id')
                 ->groupBy('cart_items.item_id', 'items.amount', 'items.item_name')
                 ->get();
             }//DB::raw('sum(quantity) as quantity,cart_items.id', 'item_name', 'amount'))
             
             
             /*カート内の商品の合計金額を計算する*/
             
                 $subtotal = 0;
                     foreach($cartitems as $cartitem){
                 $subtotal += $cartitem->amount * $cartitem->quantity;
                 }
             
                 $subtotal_tax = $subtotal * 1.1;
                //  $postage = 510;      //postage=送料
                 $total = $subtotal_tax; //+ $postage

             
            return view('cartitem/cart', ['cartitems' => $cartitems,
                                          'subtotal' => $subtotal,
                                          'subtotal_tax' => $subtotal_tax,
                                          'total' => $total]); // 'postage' => $postage,
    }
    
    
    public function destroy(Request $request)
    {
        
        if(Auth::check()){
            $cartItem = CartItem::where([['item_id', $request->item_id], ['user_id', Auth::id()]])->get();//item_idカラムの入力されたviewから
            $cartItem->delete();  //引数でCartItemモデルを取得し、delete()メソッドを呼び出せばそのレコードは削除される
            return redirect('cartitem')->with('flash_message', 'カートから削除しました');
            //削除したらredirect()で/cartitemにリダイレクトし、同時にflash_messageで削除という文字をredirect先に送っている
        } else {
            $cookie = Cookie::get('uuid');
            $cartItem = CartItem::where([['item_id', $request->item_id], ['guest_id', $cookie]])->get(); //アンド
            $cartItem->delete();  //引数でCartItemモデルを取得し、delete()メソッドを呼び出せばそのレコードは削除される
            return redirect('cartitem')->with('flash_message', 'カートから削除しました');
        } //viewでitem_id渡せてるか確認
    }
    
    
    
    
    
    
    public function update(Request $request)
    {    //update()の引数で更新すると元となるカート情報(CartItem $cartItem)と、更新する数量を受け取るためのリクエスト情報(Request $request)を受け取る
        $cartItem = CartItem::find($request->id);
        $cartItem->quantity = $request->post('quantity');  //←で更新する元の数量を上書きして、$cartItem->save();でデータベースに保存している
        $cartItem->save();
        return redirect('cartitem')->with('flash_message', 'カートを更新しました');
    }
}
