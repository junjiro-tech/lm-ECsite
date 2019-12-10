<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;

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
        //結果の配列
        $items->inventory_control();
        $this->itemArray[] = $_itemArray;
        
        $_itemArray =　\DB::table('items')->get();;
        
        foreach($_itemArray as $item){
            $item->item_name;
            $item->inventory_control;
            
            if( $item->inventory_control <= 15 )
        {
            //このアイテムを別の配列に入れてあげる
            
        }
        
        }
        
        //$cartitem->item->inventory_control <= 15　かつ itemarrayにその商品が存在してなければitemarrayに挿入する
        //配列が空じゃなかったらメールを送るという処理
        if( !$itemArray->empty())
        Mail::to('tksmjf@icloud.com')->send(new InventoryMail($_itemArray));
    }
}
