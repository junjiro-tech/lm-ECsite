<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller

{
    public function index(Request $request) {
        
        // リクエストパラメタにkeywordが入っていたら検索機能を動かす
        if($request->has('keyword')) {
        // SQLのlike句でitemsテーブルを検索する
            $items = Item::where('name', 'like', '%'.$request->get('keyword').'%')->paginate(20);
        } else {
            $items = Item::paginate(20);  //Item::pagenate(20);でitemsテーブルに保存されている商品情報を20個ずつ取り出す
        }
        
        return view('item/index', ['items' => $items]);  
        //「'item/index'」のビューを表示する、ビューに「['items' => $items]」というデータを渡す、という意味となる
       }
      
    
    
        //show()はItemモデルのオブジェクトを受け取るようにしている
    public function show(Item $item) {
        return view('item/show', ['item' => $item]);
    }
}