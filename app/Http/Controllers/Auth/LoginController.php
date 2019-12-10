<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\CartItem;
use App\Item;
use App\Uuid;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and      訳）このコントローラーは、アプリケーションのユーザーの認証とホーム画面へのリダイレクトを処理します。 
                                                                                　　コントローラは特性を使用して、アプリケーションにその機能を便利に提供します。
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }
    
     protected $redirectTo = '/';          /*ログインボタン押した後に移動するページ指定*/
     
     
     public function showLoginForm()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {                    
            session(['url.intended' => $_SERVER['HTTP_REFERER']]);
        }                                                         
        return view('auth.login');
    }
    
    public function showBuyLoginForm()
    {
        // if (isset($_SERVER['HTTP_REFERER'])) {                    
        //     session(['url.intended' => $_SERVER['HTTP_REFERER']]); //REFERER　どこから来たかっていう事
        // }                                                         
        return view('auth.buylogin');
    }
    
    /**
     * Where to redirect users after login.　訳）ログイン後にユーザーをリダイレクトする場所
     *
     * @var string
     *//*protected=そのクラス＋親子クラスからアクセス可能*/
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('top_page');
    }

    /**
     * Create a new controller instance.　　 訳）新しいコントローラーインスタンスを作成します
     *
     * @return void
     */
    public function __construct()
    {   
        $this->remember = 'checked';
        $this->middleware('guest')->except('logout');             /*認証が必要なものはMiddlewareで定義する  訳）except=を除く*/
    }
    
    //User::findBy('email', $user->email);
    
    
    public function login(Request $request)
    {
         $users = User::where('email', $request->email)->first();
        
        $uuid = Cookie::get('uuid');

        $users->password = $request->password;  //passwordは入力値と照合する
        
        Auth::login($users);
        //CartItemのguest_idの全てのレコードを取得かつuser_idがnullの人のデータを$cartitemsに代入
        $cartitems = CartItem::where('guest_id', $uuid)->whereNull('user_id')->get(); 
        
        //カートに未決済のアイテムが入っている場合
        if( !$cartitems->isEmpty() ) //empty()は配列が空かどうか、isEmpty()はCollectionのオブジェクト,collectionが空かどうか確認
        {
            foreach ($cartitems as $cartitem) 
            {
                $cartitem->user_id = Auth::id(); //Authのidを取得して$cartitemのuser_idに代入
                $cartitem->guest_id = null;      //user_idにAuthのidが入るとguest
                $cartitem->save();
            }
            
            if (isset($_SERVER['HTTP_REFERER'])) {                    
            session(['url.intended' => $_SERVER['HTTP_REFERER']]);
            }              
                
            return redirect('cartitem');
            
        //カートにアイテムが入ってない場合
        } else  {
                
            if (isset($_SERVER['HTTP_REFERER'])) {                    
            session(['url.intended' => $_SERVER['HTTP_REFERER']]);
            }   
                
            return redirect('cartitem');
        }
        
    }
    
    
    
    //カートからログインする時,cookieは削除しない
    public function buylogin(Request $request)
    {
        $users = User::where('email', $request->email)->first();
        
        $uuid = Cookie::get('uuid');
        // var_dump($uuid);exit();
        $users->password = $request->password;  //passwordは入力値と照合する
        
        Auth::login($users);
        // var_dump(Auth::user());exit();
        //CartItemのguest_idの全てのレコードを取得かつuser_idがnullの人のデータを$cartitemsに代入
        $cartitems = CartItem::where('guest_id', $uuid)->whereNull('user_id')->get(); 
        // var_dump($uuid);var_dump($cartitem);exit();
        
        //カートに未決済のアイテムが入っている場合
        if( !$cartitems->isEmpty() ) //empty()は配列が空かどうか、isEmpty()はCollectionのオブジェクト,collectionが空かどうか確認
        {
            foreach ($cartitems as $cartitem) 
            {
                $cartitem->user_id = Auth::id(); //Authのidを取得して$cartitemのuser_idに代入
                $cartitem->guest_id = null;      //user_idにAuthのidが入るとguest
                $cartitem->save();
            }
                
            return redirect('buy/index');
            
        //カートにアイテムが入ってない場合
        } else  {
                
            if (isset($_SERVER['HTTP_REFERER'])) {                    
            session(['url.intended' => $_SERVER['HTTP_REFERER']]);
            }              
                
            return redirect('cartitem');
        }
        
    }
    //user_idの更新
    
   //カートから来たらリダイレクトさき
   //リダイレクト先でカートアイテムを引っ張る
    
}

