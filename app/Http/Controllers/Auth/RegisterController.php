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

use app\AnyClass\RegisterData;
use app\Register;
use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterSendmail;


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
    protected $redirectTo = '/'; //protected=非公開だがRegisterControllerのクラス内で書いているコードと継承クラスからアクセスした時にトップページに移行する

    /**
     * Create a new controller instance.　訳)新しいコントローラーインスタンスを作成します
     *
     * @return void 訳)void=虚、虚しい、無効にする
     *///__construct()はインスタンスの生成時に必ず実行される関数、つまりnewを使った時に必ず実行される。インスタンスの初期設定
                                                          //関数は引数と呼ばれるデータを受け取り、定められた通りの処理を実行して結果を返す一連の命令
                                                          //メソッドとは、52~55行目というオブジェクトが持っている自身に対する操作or動き
                                                          //オブジェクトは「データ」と「手続き」から成っていて、その「手続き」の部分にあたる
    public function __construct()   //publicどこからでもアクセスできる function=関数 __construct=オブジェクト初期定数
    {                               //
        $this->middleware('guest'); //middlewareで認証チェックする、ログインしている人だけ実行できると制限をかける
    } //$thisはこのRegisterController内でプログラムがアクセス可能なオブジェクト名(インスタンスメソッド)の事                                 
    
    
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    

    /**
     * Get a validator for an incoming registration request. 訳)登録リクエストに入ってくるバリデータを取得する
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
     
     //条件としてフォームの一連の流れを作成できている
      public function validator(array $data) //どこからでもアクセスできる関数validateメソッド(配列 下記で代入した$dataを持つ)
      {
          return Validator::make($data, [
             'name' => 'required'|'string'|'max:255',
             'kname' => 'required'|'string'|'max:255',
             'email' => 'required'|'string'|'email'|'max:255'|'unique:users',
             'password' => 'required'|'string'|'min:8'|'confirmed',
             'tel' => 'required'|'string',
             'postal_code' => 'required',
             'prefectures_name' => 'required'|'string'|'max:255',
             'city' => 'required'|'string'|'max:255',
             'subsequent_address' => 'required'|'string'|'max:255',
         ]);
     }

    // /**
    //  * Create a new user instance after a valid registration.  訳)有効な登録後に新しいユーザーインスタンスを作成します。
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
     protected function create(array $data)  //登録ボタン押したときにcreateが自動で呼ばれる
     {
         $cookie = Cookie::get('uuid');
         
         if( !$cookie )
             {
                 $uuid = new Uuid();
                //time()を設定しなかった時は、ブラウザを閉じた時点でクッキー破棄となる。また、クッキーを現在時点より前に設定するとその時点で破棄となる
                $minites = 60 * 24;
                Cookie::queue('uuid', $uuid->uuid, $minites);  //$cookieに新規idを保存 setcookie(第1引数:'クッキーの名前'、第2引数:クッキーの値、第3引数:有効期限)
                                  //'uuid'名前とばれないような名前に後で変更
                $cookie = $uuid->uuid;  
             }
         
         $user = User::create([
             'id' => $cookie,
             'name' => $data['name'],
             'kname' => $data['kname'],
             'email' => $data['email'],
             'password' => Hash::make($data['password']), //Hash::make()は毎回違うハッシュ値を返す.なので、入力された現パスワードをHash::make()で
                                                          //ハッシュ化した値とDBに保存されているハッシュ化されたパスワードを比較しても一致することはない
             'email_verify_token' => base64_encode($data['email']),//$dataに入っているemailがbase64_encodeを使ってハッシュ化される,key=email_verify_token
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
             
         return $user;
     }
     
     
     
     
     
     
     
     public function showForm(Request $request)
     {   
         //メールで送信したパラーメーターを、route.phpでshowFormに指定したregister/verify/{token}のparameterを取得して$email_tokenに代入
         $email_token = $request->route()->parameter('token'); 
         //email_sent=メール送信済み
         //->where=アンドという意味 =はdefault 'status' '=' 0と一緒
         //User::whereでusersデータベースの(カラム='email_virify_token' parameter=$email_token)と(カラム'status'の0)を$userに代入
         $user = User::where('email_verify_token', $email_token)->where('status', 0)->first();//if文の中に入れると毎回データベースにアクセスするため重くなる
         //本登録
         if  ( $user )//( $user->exists() ) //もし、$userにトークンとstatus0が入っていれば
         {
             $user->status = config('const.USER_STATUS.REGISTER');//config/constのUSER_STATUSのregisterを$userのstatusに代入、つまりstatusを1に
             logger("status". $user->status); //開発者がこの挙動についてlogをつけているだけ、userのstatusを変えたよと
             $user->save(); //送信メールのurlに付けたparameterのtokenとstatus1をデータベースに保存
             return view('auth.registered')->with('message', '本会員登録完了しました。ログインして利用してください。');
             
         } else {
             //本登録済ユーザーか確認
             $user = User::where('email_verify_token', $email_token)->first(); //first()は、単一レコードの取得、データベースのemail_verify_tokenを$userに代入
             
             if ($user->status == config('const.USER_STATUS.REGISTER')) //もし$userデータベースが1で、constで設定しているREGISTER=1で型以外等しい場合
             {
             logger("status". $user->status); //データベースと公司との値は同じだよとlog付け
             return view('auth.registered')->with('message', 'すでに本登録されています。ログインしてご利用ください。');
             }
         }
         //ユーザーステータス更新
        //  $user->status = config('const.USER_STATUS.MAIL_AUTHED');//←これはステータス値をconst(定数)で管理するようにしている。constの定数管理はconfig/const.phpの中で行う
        //  $user->verify_at = Carbon::now(); //Carbon::nowで現在時刻を取得しUserのverify_atに入れる
        //  if($user->save() ) { //もしユーザーUserのデータベースに保存されたら
        //      return view('auth.registered', compact('email_token')); //compactはview('auth.registered')->with('email_token');と同じ仕組みだが可読性が高いらしい
        //  } else {
        //      return view('auth.registered')->with('message', 'メール認証に失敗しました。再度、ﾒｰﾙからリンクをクリックしてください。');
        //  }
     }
    

    //仮登録 訳)provisional_register　変数にフォームの値を代入して、それを確認画面に表示、入力画面で入力したemailの人のみ進める
    public function provisional_register(RegisterRequest $request)
    {   
        $request->flashOnly('email'); //flashOnlyはセッションに限定した入力値のみを保存する。
                                      //全ての内容を保存するのはInput::flash()、Input::flashExcept(‘password’)ではパスワード以外を保存
                                      //ここでなぜemailでsessionを使っているかというと、入力画面で入力していない人でも確認画面のurlを知っている人なら
                                      //確認画面を見る事ができるので、入力画面で入力したemailを持っている人だけが次の確認画面を見る事ができるため
        $register_data = $request->all();
        $register_data['password_mask'] = '****************'; 
        
        return view('auth.provisional_register', ['register_data' => $register_data]); //register_data持って
    }



    //データベースへの保存、ハッシュ化されたurlメール送信、メール送信完了画面へ移行          
    public function complete(Request $request)
     {   
         
         $user = new User();  //新規ユーザーを$userとする
         $register_data = $request->all();  //確認画面のnameの値を全て取得して$register_dataに代入
         
         $action = $request->get('action', 'back');  //確認画面のbuttonのvalue="action"のname="back"を$actionに入れる
         $register_data = $request->except('action');//↑でactionに入れたbackをexceptで除いたらpostになる、それを$register_dataに入れるとaction=postとなる
        
         if($action === 'post') { //もし(さっき入れた$actionのポストと'post'の値と型が同じ場合)
            $user->email_verify_token = base64_encode($register_data['email']);//変数$register_dataに入っているemailがbase64_encodeを使ってハッシュ化される
                                                                               //↑をuserモデルのemail_verify_tokenに入れる
            $user->fill($register_data);  //183行目で生成したトークンを$register_dataに持たせる
            
            $user->password = Hash::make($register_data['password']); //Hash::makeでアクセス毎に違うhashを生成、
            $user->save(); //新規userのデータベースに入れる,←データベースに保存されるタイミングで初めて上のcreateアクションが呼ばれる
            
            
            $email = new RegisterSendmail($user);  //RegisterSendmailでbuildした内容を持たせる。(差出人、件名、どのviewか、$this->user->email_verify_token)
            Mail::to($user->email)->send($email);  //新規ユーザーのメールアドレスにRegisterSendmailの内容を送る
            $request->session()->regenerateToken();//session()->regenerateToken();をしておくとブラウザバックしても2重送信をしない。もし、ブラウザバックを行った場合
                                                   //トークンエラーが発生するが、それが正常な動き。ただこのトークン更新は、->save()した後に行った方が良い
            
            \Debugbar::info(['complete' => $user]);
            return view('auth/register_complete');
        } else {
            return redirect()
                  ->route('register')
                  ->withInput($register_data);
         
         
     }
    
 
     }
}