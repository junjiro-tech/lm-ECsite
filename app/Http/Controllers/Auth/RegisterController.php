<?php

namespace App\Http\Controllers\Auth;

use App;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterSendmail;
use app\AnyClass\RegisterData;
use app\Register;


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
      public function validator(array $data)
      {
          return Validator::make($data, [
             'name' => ['required', 'string', 'max:255'],
             'kname' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
             'gender' => 'required',
             'birthday1' => ['required', 'string',],
             'birthday2' => ['required', 'string',],
             'birthday3' => ['required', 'string',],
             'tel' => ['required', 'string'],
             'postal_code' => 'required',
             'prefectures_name' => ['required', 'string', 'max:255'],
             'city' => ['required', 'string', 'max:255'],
             'subsequent_address' => ['required', 'string', 'max:255']
         ]);
     }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
     public function create(array $data)  //登録ボタン押したときにcreateが自動で呼ばれる
     {
         return User::create([
             'name' => $data['name'],
             'reading' => $data['reading'],
             'email' => $data['email'],
             'password' => Hash::make($data['password']),
             'password_confirmation' => Hash::make($data['password_confirmation']),
             'gender' => $data['gender'],
             'birthday1' => $data['birthday1'],
             'birthday2' => $data['birthday2'],
             'birthday3' => $data['birthday3'],
             'tel' => $data['tel'],
             'postal_code' => $data['postal_code'],
             'prefectures_name' => $data['prefectures_name'],
             'city' => $data['city'],
             'subsequent_address' => $data['subsequent_address']
         ]);
         
     }
    
    
    
    
    public function confirm(RegisterRequest $request)
    {
        $register_data = $request->all();
        return view('auth/register_confirm', ['register_data' => $register_data]);
    }
    
    
    
    
    public function complete(Request $request)
    {
        $register_text = new User();
        $register_data = $request->all();
         
        $register_text->fill($register_data);
        $register_text->password = Hash::make($register_data['password']); //ハッシュ化してないとログインできない
        $register_text->save(); //カラムの更新
        \Debugbar::info($register_text);
        
        \Debugbar::info("test");
        $action = $request->get('action', 'back');
        $register_data = $request->except('action');
        
        \Debugbar::info($register_data);
        if($action === 'post') {
            \Mail::to($register_data["email"])->send(new RegisterSendmail($register_data));
            $request->session()->regenerateToken();
            
            return view('auth/register_complete');
        } else {
            return redirect()
                   ->route('register')
                   ->withInput($register_data);
        }
    }
}
