<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    /**
     * Where to redirect users after login.　訳）ログイン後にユーザーをリダイレクトする場所。
     *
     * @var string
     *//*protected=そのクラス＋親子クラスからアクセス可能*/
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('top_page');
    }

    /**
     * Create a new controller instance.　　 訳）新しいコントローラーインスタンスを作成します。
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('guest')->except('logout');             /*認証が必要なものはMiddlewareで定義する  訳）except=を除く*/
    }
    
   
    
}
