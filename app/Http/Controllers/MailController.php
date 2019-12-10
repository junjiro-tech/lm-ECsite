<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Mail\InventoryMail;
use DB;

class MailController extends Controller
{
    //ItemArrayに入っている配列をゲッターで取得
    public function index() 
    {
        //空の配列　名前、数
        // $itemArray = ['item_name'=> '', 'inventory_control'=> '',];
        $_itemArray =　\DB::table('items')->get();;
        
        return InventoryMail::$_itemArray;
        
        //商品の在庫が15個以下になれば管理者へメール送信する
        if( $item->inventory_control <= 15 && $_itemArray )
        {
            Mail::to('tksmjf@icloud.com')->send(new InventoryMail($_itemArray));
        }
            //購入処理と在庫数を1個減らす　　それが終わってから在庫数見て
            //$cartitem->item->inventory_control <= 15　かつ itemarrayにその商品が存在してなければitemarrayに挿入する
    }
    
}
