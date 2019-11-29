<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;


class LoginController extends Controller
{
    
    use AuthenticatesUsers;
    
    //ログイン後のリダイレクト先
    protected $redirectTo = '/admin/images/list';  
    
    
     //ゲストは弾く
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    
    
    //管理者ログインページ
    public function showLoginForm()
    {
        return view('admin.login');
    }
    
    
    protected function guard()
    {
        return \Auth::guard('admin'); //管理者認証のguardを指定,、登録済みユーザーを認証するために使用する「ガード」
        //Auth::guardではSessionGuardをセットしていて、セッションやリクエストのセットを行っている
    }
    
    
    public function logout(Request $request)
        {
        Auth::guard('admin')->logout();  //変更
        $request->session()->flush();
        $request->session()->regenerate();
 
        return redirect('admin.login');  //変更
        }
    
    
    
}





//ポストのログインがあったら
    // public function authenticate(Request $request)
    //     {
    //         // $user = Admin::findBy('email', $request->email);
            
            
    //     // if (Hash::check($request['email'], $user->email)){  //バリデート行わずに照合する
            
    //     // }
            
        
    //     // if ($request->isMethod('post')) {
    //     //     $authinfo = [
    //     //         'email' => $request->email];
                
    //     //         if (Auth::attempt($authinfo)) {
    //     //             return redirect()->route('admin/home');
    //     //         }
    //     // }
    //     $email = $request->email;
        
    //     $user = Admin::where(['email' => $email])->first();
    //         Auth::loginUsingId(1);
             
    //         return view('admin.home');
    //     }