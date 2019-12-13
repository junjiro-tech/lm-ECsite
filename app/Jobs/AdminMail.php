<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;

//redisでjobを作成
class AdminMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    //itemインスタンス保持用配列
    private $_itemArray = array();

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $_itemArray =　\DB::table('items')->get();;
        //結果の配列
        $this->_itemArray[] = $_itemArray;
        $items = $this->itemArray;
          
        
        foreach ($_itemArray as $item){
            $items = $item->item_name;
            $items = $item->inventory_control;
            $items->save();
            
            if( $item->inventory_control <= 15 )
        {
            //このアイテムを別の配列に入れてあげる
            $this->itemArray[] = $items;
        }
        
        }
        
        //$cartitem->item->inventory_control <= 15　かつ itemarrayにその商品が存在してなければitemarrayに挿入する
        //配列が空じゃなかったらメールを送るという処理
        if( empty($_itemArray)){
            Mail::to('tksmjf@icloud.com')->send(new InventoryMail($_itemArray));
        }
        
        Log::info('キュー実行完了');
        
    }
}
