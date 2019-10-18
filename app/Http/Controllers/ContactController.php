<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  //Controller.phpの中のuse Illuminate\Foundation\Validation\ValidatesRequests;を呼び出している
use App\Mail\ContactSendmail;
use App\Contact_us;
use App\Contact;

class ContactController extends Controller
{
   
   
    public function index()
    {
        \Debugbar::info("index");
        return view('contacts.contact');
    }

    
    
    
    public function create(Requrst $request)
    {
        // Varidationを行う
        $this->validate($request, Contact::$rules);       //validate()の第１引数にリクエストのオブジェクトを渡し、$request->all()を判定して、問題があるなら、
                                                          //エラーメッセージと入力値とともに直前のページに戻る機能を持っています
        $contact_us = new Contact_us();  //レコードを生成するインスタンス
        $inputs3 = $request->all();       //フォームから受け取ったすべてのinput3の値を取得
        
        // フォームからデータが送信されてきたら、パスを保存する
        /*if (isset($form3['name', 'email', 'body'])) {
            
        }*/
        
        //contact.blade.php\Inputタグのname属性がnameの場合 $request->name で値を受け取る
        //モデルインスタンスのname属性に代入
        $contact_us->name = $request->name;
        $contact_us->email = $request->email;
        $contact_us->body = $request->body;
        
        //fillメソッドはmodelの複数カラムを更新する
        $contact_us->fill($inputs3);
        //saveメソッドが呼ばれると新しいレコードがデータベースに挿入される
        $contact_us->save();
    }
    
    public function confirm(Request $request)
    {
        \Debugbar::info("test");
        $this->validate($request, [
        "email" => "required",
        "name" => "required",
        "body" => "required"
        ]);
        //フォームから受け取ったすべてのinputの値を取得
        $inputs3 = $request->all();
        //入力内容確認ページのviewに変数を渡して表示
        return view('contacts.confirm', ['inputs3' => $inputs3]);
                                        //[]は連想配列でinputs3という名前の物が=>を使って$inputs3に連想配列の値とキーを設定いしている
    }
    
    public function complete(Request $request)
    {
        \Debugbar::info("re_test");
        $this->validate($request, [
        "email" => "required",
        "name" => "required",
        "body" => "required"
        ]);
        
        
        //フォームから受け取ったactionの値を取得
        $action = $request->get('action', 'back');
        
        //フォームから受け取ったactionを除いたinputの値を取得
        $inputs3 = $request->except('action');
        
        //実行したい分岐：各ボタンに同name="submit"をつけてvalue="back", "send"で分岐させたい
        \Debugbar::info($inputs3);
        // 確認画面でこの内容で問い合わせボタンが押された場合
        if($action === 'post') {
            //入力されたメールアドレスにメールを送信
            \Mail::to($inputs3["email"])->send(new ContactSendmail($inputs3));
            //再送信を防ぐためにトークンを再発行」
            $request->session()->regenerateToken();  //session()はコンピュータのサーバー側に一時的にデータを保存する仕組みのこと
                                                     //Web上でのログイン情報や最終アクセスなど、ユーザーに直接紐づくような大切なデータを
                                                     //セッションに格納して使ったりします。regenerateToken()で２重送信防止
            return view('contacts.complete');        
            
        //確認画面で入力内容修正が押された場合
        } else {
            //もし$actionとsubmitボタンで送られた物が同じじゃないか、== 同じ型でない場合true
            return redirect()
                  ->route('contact') //入力画面に戻る
                  ->withInput($inputs3); //前ページのinput($inputs3)を持って
        }
    }
    
    //logをターミナルに表示できるようにする





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
