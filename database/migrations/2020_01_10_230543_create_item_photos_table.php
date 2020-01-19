<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_photos', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->Biginteger('item_id')->unsigned();  //外部キー属性の時よく使う、符号なしに設定
            $table->foreign('item_id')->references('id')->on('items'); //外部キー参照
            $table->string('image_path')->nullable()->default('');  //->nullable()という記述は、画像のパスは空でも保存できます、という意味
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
        Schema::dropIfExists('item_photos');
    }
}
