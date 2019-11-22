<?php

namespace App;

use App\Uuid;
use App\Item;
use App\CartItem;
use Illuminate\Database\Eloquent\Model;
use database\migrations;

class Uuid extends Model   //UUIDはランダムな文字列
{
    // protected $fillable = ['guest_id'];
    
    public $prefix;  //訳)prefix=接頭
    
    public $entropy; //訳)entropy=情報に含まれている不確かさの度合いを示す
                             //__construct($prefix='空白', $entropy=違いを示さなくていい？, $hash = なし)
    public function __construct($prefix = '', $entropy = false, $hash = null) 
    {        
        switch ($hash) { //hashが空の場合　//訳)hash=細切れにする、例)ハッシュドポテト、ハッシュ関数はデータを細切れにして何らかのデータを取り出す関数
                         //hashの使い方：暗号化する時hash化された文書は僅かなビット数のハッシュ値に対して操作する事ができるので
                         //メモリの節約、また適切なハッシュ関数を選べば、ハッシュ値から元の値に関する情報を得られないようにできる
            case 'md5': //32文字の16進数を返す
                //実行結果例：719deecdbfec1e13b4ed4e755ed39a47
                $this->uuid = md5(uniqid($prefix, $entropy)); //uniqid()でユニークID作成
            break;
            default: // $entropy:true 実行結果例：145677405658ddab75790ea7.19793837  defalutは、式がいずれも正しくない時の処理を書く
                $this->uuid = uniqid($prefix, $entropy);
            break;
        }
        
            
    }
    
    
    
    /**
    * Limit the UUID by a number of characters ←UUIDを文字数で制限する
    *
    * @param $length  length=長さ
    * @param int $start
    * @return $this
    */
    public function limit($length, $start = 0) //limit()はlimit句に置き換わる。「何件とる」・takeエイリアスが存在する 訳)alias=別名
    {
        $this->uuid = substr($this->uuid, $start, $length);  //substrは文字列の一部を返す
                    //例)$rest = substr("abcdef", -3, 1); //"d"を返す。-3で後ろから3文字目、-1で１文字分という指定
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function __toString()  //toStringでechoなどした時に任意の文字列を出力できるようになる、例外は認めない
    {
        return $this->uuid;
    }
       
}






















// 　　public $incrementing = false;   //$incrementing = false;で連番でなくす
       
//       /**
//         * The "booting" method of the model.
//         * モデルの「初期起動」メソッド
//         *
//         * @return void
//         */
        
//       protected static function boot()
//       {
//           parent::boot();
           
//           //creatingイベントを登録する事で、データ作成時にその時ログインしている
//           //ユーザーのIDを暗黙に登録するようになる
//           static::creating(function ($model) { 
//               $model->{getKeyName()} = Uuid::generate()->string; //generate 訳)生成する
//           });
//           //getKeyName()はキャストと言って、数字で登録したデータを文字列に変換する
//       }

    // 
    
    

