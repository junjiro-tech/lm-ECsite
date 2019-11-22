<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use App\Uuid;
use App\CartItem;
use storage;

class ItemController extends Controller

{
    
    public function index(Request $request) {
        
        
        // リクエストパラメタにkeywordが入っていたら検索機能を動かす
        if($request->has('keyword')) {
        // SQLのlike句でitemsテーブルを検索する
            $items = Item::where('item_name', 'like', '%'.$request->get('keyword').'%')->paginate(16);
        } else {
            $items = Item::paginate(16);  //Item::pagenate(20);でitemsテーブルに保存されている商品情報を20個ずつ取り出す
        }
        
        return view('item/index', ['items' => $items]);
        //「'item/index'」のビューを表示する、ビューに「['items' => $items]」というデータを渡す、という意味となる
       }
      
    
    
        //show()はItemモデルのオブジェクトを受け取るようにしている
    public function show(Item $item) {
        return view('item/show', ['item' => $item]);
    }
}