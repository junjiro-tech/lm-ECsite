<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\CartItem;
use App\Uuid;
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
    
    
    //カートからログインする時,cookieは削除しない
    public function buylogin(Request $request)
    {
        
        //カートにアイテムがない場合
        $cookie = Cookie::get('uuid'); 
        $user = $request->email->password;
        $users = DB::table('users')->get();
        
        $id = CartItem::find($cookie->id);
        
        if( DB::table('cart_items')->$id )
        {
        
        Auth::login($user);
        
        DB::table('cart_items')
            ->where('guest_id', $cookie)
            ->update(['user_id', $users]);
            
        if (isset($_SERVER['HTTP_REFERER'])) {                    
        session(['url.intended' => $_SERVER['HTTP_REFERER']]);
        }                                                         
            return redirect('buy/index', ['users' => $users]);
            
            
            
        //カートに未決済のアイテムが入っている場合
        } elseif (DB::table('cart_items')->id ) {
            
        $user_item = CartItem::find('cart_items', 'amount', 'quantity');
        $guest_item = CartItem::find('cart_items', 'amount', 'quantity');
        Auth::login($user);
            
        if (isset($_SERVER['HTTP_REFERER'])) {                    
        session(['url.intended' => $_SERVER['HTTP_REFERER']]);
        }    
            return redirect('buy/index', ['users' => $users]);
        }
        
    }
    //user_idの更新
    
   //カートから来たらリダイレクトさき
   //リダイレクト先でカートアイテムを引っ張る
    
}

