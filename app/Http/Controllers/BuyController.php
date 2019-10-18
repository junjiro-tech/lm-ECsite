<?php

namespace App\Http\Controllers;

use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\Buy;
use Illuminate\Support\Facades\Mail; //store()ﾒｿｯﾄﾞの購入完了ﾍﾟｰｼﾞを表示する前に、ﾒｰﾙ送信の処理を組み込む

class BuyController extends Controller
{
    
    public function index()
    {
        $cartitems = CartItem::select('items.name', 'items.amount', 'quantity')
             ->where('user_id', Auth::id())                          
             ->join('items', 'items.id', '=', 'cart_items.item_id') 
             ->get();                                               
             
             $subtotal = 0;
             foreach($cartitems as $cartitem){
                 $subtotal += $cartitem->amout * $cartitem->quantity;
             }
             return view('buy/index', ['cartitems' => $cartitems, 'subtotal' => $subtotal]);
    }
    
    
    
    public function store(Request $request)
    {
        if( $request->has('post') ){ //←でフォームからのリクエストパラメータにpostという値が含まれているかどうかを判定
            //postが含まれている場合は注文を確定する処理を実行
            //postが含まれていなければもう一度購入画面を表示し、ビュー側で入力確認用の表示に切り替える
            Mail::to(Auth::user()->email)->send(new Buy());//MailクラスとBuyクラスを使ってメールを送信する
            //Auth::user()->emailでﾛｸﾞｲﾝ中のﾕｰｻﾞｰのﾒｰﾙｱﾄﾞﾚｽを取得し、Mail::to()ﾒｿｯﾄﾞに渡す事で送信先を設定している
            //次にnew Buy()でBuyｸﾗｽのｲﾝｽﾀﾝｽを生成し、Mail::send()ﾒｿｯﾄﾞに渡してﾒｰﾙを送信している
            CartItem::where('user_id', Auth::id())->delete();//←でユーザーが持っているカート情報を削除し、同じ注文を何度も行ってしまわないようにする
            return view('buy/complete');//削除したら←で購入完了へ進む
        }
        $request->flash();//←でフォームのリスクエスト情報をセッションに記録する。これにより、確認画面ではセッション情報を取り出して入力内容を表示できる
        return $this->index();//←で購入画面のビューを再度表示している
    }
}
