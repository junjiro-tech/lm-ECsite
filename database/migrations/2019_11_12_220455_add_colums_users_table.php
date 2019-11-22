<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->tinyInteger('email_verified')->default(0);//メール認証済みかどうか
            $table->string('email_verify_token')->nullable(); //email用トークン 訳)verify=検証、確認する
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn('email_verified');
            $table->dropColumn('email_verify_token');
        });
    }
}
