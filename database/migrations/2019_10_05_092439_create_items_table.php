<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id'); //主キー
            $table->string('item_name', 100);
            $table->string('explanation', 255)->default('');
            $table->integer('amount');   //amout=金額
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()    //関数downには、マイグレーションの取り消しを行う為のコードを書きます
                              
    {
        Schema::dropIfExists('items');//ここでは、もしitemsというテーブルが存在すれば削除すると書かれています
    }
}
