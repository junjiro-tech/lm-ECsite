<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration. 訳)登録後にユーザーをリダイレクトする場所
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     *///__construct()はインスタンスの生成時に必ず実行される関数、つまりnewを使った時に必ず実行される。インスタンスの初期設定
    public function __construct()   //またインスタンス生成時のみに、それ以降は実行されないため製品製造時などその物が変わらない物に使う
    {                               //コンストラクタは製造工程で行うべきことが書かれていると考えるとわかりやすい。
        $this->middleware('guest'); //例)ログインしていないと実行出来ないように制限をかけたい場合(認証チェック)などでミドルウェアの機能を利用します。
    }

    /**
     * Get a validator for an incoming registration request. 訳)着信登録リクエストのバリデータを取得します
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'kname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => 'required',
            'birthday' => ['required', 'integer',],
            'phone_num' => ['required', 'integer'],
            'postal_code' => 'required',
            'prefectures_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'subsequent_address' => ['required', 'string', 'max:255']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'reading' => $data['reading'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'phone_num' => $data['phone_num'],
            'postal_code' => $data['postal_code'],
            'prefectures_name' => $data['prefectures_name'],
            'city' => $data['city'],
            'subsequent_address' => $data['subsequent_address']
        ]);
    }
    
    
    public function confirm(Request $request)
    {
        $inputs2 = $request->all();
        return view('auth/register_confirm', ['inputs2' => $inputs2]);
    }
    
    public function complete(Request $request)
    {
        \Debugbar::info("test");
        $this->validate($request,[
            'name' => 'required',
            'kname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'postal_code' => 'required',
            'prefectures_name' => 'required',
            'city' => 'required',
            'subsequent_address' => 'required'
        ]);
        
        $action = $request->get('action', 'back');
        $inputs2 = $request->except('action');
        
        \Debugbar::info($inputs2);
        if($action === 'post') {
            \Mail::to($inputs2["email"])->send(new RegisterSendmail($inputs2));
            $request->session()->regenerateToken();
            
            return view('auth/register_complete');
        } else {
            return redirect()
                   ->route('register')
                   ->withInput($inputs2);
        }
    }
}