<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()   /*up関数の中でカラムを定義する*/
    {                                
        Schema::create('users', function (Blueprint $table) {  /*createメソッドでは、第１引数にテーブル名のusers、第２引数にクロージャを指定する*/
            $table->bigIncrements('id');                       /*クロージャでは、第１引数にBlueprintオブジェクト、第２引数に$tableを指定する*/
            $table->string('name');
            $table->string('kname')->comment('フリガナ');
            $table->string('email')->unique();                 /*unique使用の注意点:uniqidは暗号としては脆弱なので、パスワードやトークンとして利用しないように気をつける*/
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender')->length(2);
            $table->string('birthday1');
            $table->string('birthday2');
            $table->string('birthday3');
            $table->string('tel');
            $table->string('postal_code')->comment('郵便番号');
            $table->string('prefectures_name')->comment('都道府県名'); //JIS X0401に準拠して01～47が入るためstring（verchar(2)で定義
            $table->string('city')->comment('市区町村');
            $table->string('subsequent_address')->comment('その以降の住所');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');   /*down関数の中ではテーブル削除の処理が記述されている*/
    }
}
