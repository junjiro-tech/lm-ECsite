<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\CartItem;
use App\Item;
use App\Uuid;
use Illuminate\Support\Facades\Cookie;
use App\Admin;
use DB;

use App\Mail\Buy;
use Illuminate\Support\Facades\Mail; //store()ﾒｿｯﾄﾞの購入完了ﾍﾟｰｼﾞを表示する前に、ﾒｰﾙ送信の処理を組み込む

class BuyController extends Controller
{
    //購入内容、登録内容確認画面へ
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if( Auth::check())
            {
            $cartitems = CartItem::select(DB::raw('sum(quantity) as quantity, cart_items.item_id as item_id, items.item_name as item_name, items.amount as amount, items.image_path as image_path'))  //select関数は('aテーブル.bカラム')を取ってくるという時に使える
                     ->where('user_id', Auth::id())                      
                     ->join('items', 'cart_items.item_id', '=', 'items.id') //join('itemテーブルから', 'cart_itemsのitem_idをキーにてしてitem.idの情報を取得している。cart_itemsテーブルとitemsテーブルを結合しています,cart_itemsテーブルは商品のID(cart_items.item_id)しか持っていないので、cart_items.item_idをキーにしてitemsテーブルから商品名と価格を取得できるようにしています
                     ->groupBy('cart_items.item_id', 'items.amount', 'items.item_name', 'items.image_path') //'テーブル名.カラム名'
                     ->get();                                               //最後にget()で検索結果を取得し、ビューに渡しています                                              
                 
            $subtotal = 0;
            foreach($cartitems as $cartitem){
                $subtotal += $cartitem->amount * $cartitem->quantity;
            }
             
            $subtotal_tax = $subtotal * 1.1;
            $postage = 510;      //postage=送料
            $total = $subtotal_tax + $postage; //+ $postage
             
            return view('buy/index', ['cartitems' => $cartitems,
                                       'subtotal' => $subtotal,
                                       'subtotal_tax' => $subtotal_tax,
                                       'postage' => $postage,
                                       'total' => $total,
                                       'user' => $user,
                                       ]);
        } else {
            return redirect('/cartitem')->with('flash_message', '会員登録されるか非会員購入ボタンを押してください');
        }
    }
    
    
    
    //購入完了画面へ
    public function store(Request $request)
    {
        
        $user = Auth::user();
        
        $cartitems = CartItem::where('user_id', Auth::id())->get();  
        $cartitems = Item::where('user_id', Auth::id())->get();
             \Debugbar::info($cartitems);
        $subtotal = 0;
        
        foreach($cartitems as $cartitem){
            $subtotal += $cartitem->item->amount * $cartitem->quantity;
            
            // $num = $cartitem->item->inventory_control - $cartitem->quantity;
            $cartitem->item->inventory_control -= $cartitem->quantity;
            $cartitem->item->save();
        }
        
        
        
        $action = $request->get('action', 'back');//確認画面のbuttonのvalue="action"のname="back"を$actionに入れる
        
        //フォームから受け取ったactionを除いたinputの値を取得
        $user = $request->except('action');
        
        
        //↓でフォームからのリクエストパラメータにpostという値が含まれているかどうかを判定
        if( $request->has('post') ) { 
            //postが含まれている場合は注文を確定する処理を実行
            //postが含まれていなければもう一度購入画面を表示し、ビュー側で入力確認用の表示に切り替える
            Mail::to(Auth::user()->email)->send(new Buy());//MailクラスとBuyクラスを使ってメールを送信する
            //Auth::user()->emailでﾛｸﾞｲﾝ中のﾕｰｻﾞｰのﾒｰﾙｱﾄﾞﾚｽを取得し、Mail::to()ﾒｿｯﾄﾞに渡す事で送信先を設定している
            //次にnew Buy()でBuyｸﾗｽのｲﾝｽﾀﾝｽを生成し、Mail::send()ﾒｿｯﾄﾞに渡してﾒｰﾙを送信している
            
            $subtotal_tax = $subtotal * 1.1;
            $postage = 510;      //postage=送料
            $total = $subtotal_tax + $postage;
            
            CartItem::where('user_id', Auth::id())->delete();//←でユーザーが持っているカート情報を削除し、同じ注文を何度も行ってしまわないようにする
            
            return view('buy/complete');
        } else {
            //もし$actionとsubmitボタンで送られた物が同じじゃないか、== 同じ型でない場合true
            return redirect()
                  ->route('guest_index')
                  ->withInput($user);
        
             
        
        
        
        // $request->flash();//←でフォームのリスクエスト情報をセッションに記録する。これにより、確認画面ではセッション情報を取り出して入力内容を表示できる
        // return $this->index();//←で購入画面のビューを再度表示している
    }
}
}
