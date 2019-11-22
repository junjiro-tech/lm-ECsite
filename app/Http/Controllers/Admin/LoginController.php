<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Morino;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    //ログイン後のリダイレクト先
    protected $redirectTo = '/images/list';  
    
    
    
    //管理者ログインページ
    public function index()
    {
    return view('admin/login');
    }
    
    
    
    
    protected function guard()
    {
        return \Auth::gurad('admin'); //管理者認証のguardを指定
        //Auth::guradではSessionGuardをセットしていて、セッションやリクエストのセットを行っている
    }
    
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $this->performLogout($request);
        return redirect()->route('morino_to');
        // $this-&gt;guard()-&gt;logout();   //&gt;はgreater thanの略「大きい」&lt;はless thanの略「小さい」
    }
    
    
    //ゲストは弾く
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    
}
