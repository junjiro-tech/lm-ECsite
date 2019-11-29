<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CartItem;
use App\Item;
use App\Uuid;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use App\GuestUser;
use App\Mail\Buy;
use Illuminate\Support\Facades\Mail; //store()ﾒｿｯﾄﾞの購入完了ﾍﾟｰｼﾞを表示する前に、ﾒｰﾙ送信の処理を組み込む

class GuestBuyController extends Controller
{
    
    
    public function validator(array $data) //どこからでもアクセスできる関数validateメソッド(配列 下記で代入した$dataを持つ)
      {
          return Validator::make($data, [
             'name' => 'required'|'string'|'max:255',
             'email' => 'required'|'string'|'email'|'max:255'|'unique:users',
             'tel' => 'required'|'string',
             'postal_code' => 'required',
             'prefectures_name' => 'required'|'string'|'max:255',
             'city' => 'required'|'string'|'max:255',
             'subsequent_address' => 'required'|'string'|'max:255',
         ]);
     }
    
    
    //ゲストお届け先入力画面
    public function index()
    {
        return view('buy/guest/index');
    }
    
    
    //ゲスト情報登録
    public function create(Request $request)
    {
        $this->validate($request, GuestUsers::$rules);
         
         $guest = new GuestUsers;
         $guestData = $request->all();
         
         $guest->name = $request->name;
         $guest->email = $request->name;
         $guest->tel = $request->name;
         $guest->postal_code = $request->name;
         $guest->prefectures_name = $request->name;
         $guest->city = $request->name;
         $guest->subsequent_address = $request->name;
             
         $guest->fill($guestData)->save();
    }
    
    
    //ゲストお届け先と購入商品、値段の表示
    public function confirm(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "tel" => "required",
            "postal_code" => "required",
            "prefectures_name" => "required",
            "city" => "required",
            "subsequent_address" => "required",
            ]);
            
        $guestData = $request->all();
            
            
            
        $cookie = Cookie::get('uuid');
        
        $cartitems = CartItem::select('cart_items.id', 'item_name', 'amount', 'quantity')  
                ->where('guest_id', $cookie)                     
                ->join('items', 'cart_items.item_id', '=', 'items.id') 
                ->get();              
             
        $subtotal = 0;
        foreach($cartitems as $cartitem){
            $subtotal += $cartitem->amout * $cartitem->quantity;
        }
        $subtotal_tax = $subtotal * 1.1;
        $postage = 510;      //postage=送料
        $total = $subtotal_tax; //+ $postage
             
        return view('buy/guest/confirm', ['guestData' => $guestData,
                                          'cartitems' => $cartitems,
                                          'subtotal' => $subtotal,
                                          'subtotal_tax' => $subtotal_tax,
                                          'postage' => $postage,
                                          'total' => $total]);
    }
    
    
    //購入完了メール送信
    public function complete(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "tel" => "required",
            "postal_code" => "required",
            "prefectures_name" => "required",
            "city" => "required",
            "subsequent_address" => "required",
            ]);
            
            $action = $request->get('action', 'back');
        
        //フォームから受け取ったactionを除いたinputの値を取得
        $guestData = $request->except('action');
        
        //実行したい分岐：各ボタンに同name="submit"をつけてvalue="back", "post"で分岐させたい
        // 確認画面でこの内容で問い合わせボタンが押された場合
        if($action === 'post') {
            //入力されたメールアドレスにメールを送信
            \Mail::to($guestData["email"])->send(new Buy($guestData));
            //再送信を防ぐためにトークンを再発行」
            $request->session()->regenerateToken();  //session()はコンピュータのサーバー側に一時的にデータを保存する仕組みのこと
                                                     //Web上でのログイン情報や最終アクセスなど、ユーザーに直接紐づくような大切なデータを
                                                     //セッションに格納して使ったりします。regenerateToken()で２重送信防止
            return view('/buy/guest/complete');        
            
        //確認画面で入力内容修正が押された場合
        } else {
            //もし$actionとsubmitボタンで送られた物が同じじゃないか、== 同じ型でない場合true
            return redirect()
                  ->route('guest_form')
                  ->withInput($guestData); 
        }
    }
    
    
}
