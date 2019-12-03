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
            $table->string('name')->default('');
            $table->string('kname')->default('')->comment('フリガナ');
            $table->string('email')->unique()->default('');                 /*unique使用の注意点:uniqidは暗号としては脆弱なので、パスワードやトークンとして利用しないように気をつける*/
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('');
            $table->string('gender')->length(2)->default('');
            $table->string('birthday1')->default('');
            $table->string('birthday2')->default('');
            $table->string('birthday3')->default('');
            $table->string('tel')->default('');
            $table->string('postal_code')->default('')->comment('郵便番号');
            $table->string('prefectures_name')->default('')->comment('都道府県名'); //JIS X0401に準拠して01～47が入るためstring（verchar(2)で定義
            $table->string('city')->default('')->comment('市区町村');
            $table->string('subsequent_address')->default('')->comment('その以降の住所');
            $table->boolean('is_member')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }  
     
    //uuidを使うためにmodelで

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
