<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_users', function (Blueprint $table) {
            $table->uuid('id')->primary;
            $table->string('name');
            $table->string('email')->unique;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('tel');
            $table->string('postal_code')->comment('郵便番号');
            $table->string('prefectures_name')->comment('都道府県名'); //JIS X0401に準拠して01～47が入るためstring（verchar(2)で定義
            $table->string('city')->comment('市区町村');
            $table->string('subsequent_address')->comment('その以降の住所');
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
        Schema::dropIfExists('guest_users');
    }
}
