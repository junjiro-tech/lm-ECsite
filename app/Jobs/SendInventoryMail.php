<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\InventoryMail;
use DB;

//redisでjobを作成
class SendInventoryMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    //$_はインスタンス変数 static宣言は、インスタンス化せずその変数にアクセスできる　メモリ上に残り続ける
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    //itemインスタンス保持用配列

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $items =　\DB::table('items')->get();
        // //結果の配列
        // $item_inventory = array();
        
        // foreach ($items as $item){
            
        //     if( $item->inventory_control <= 15 )
        //     {
        //         array_push($item_inventory, $item);
        //     }
        // }
        
        // //$cartitem->item->inventory_control <= 15　かつ itemarrayにその商品が存在してなければitemarrayに挿入する
        // //配列が空じゃなかったらメールを送るという処理
        // if( !empty($item_inventory) ){
        //     return $this //このクラスに
        //         ->from('junjiro.tech@gmail.com')
        //         ->subject('LM 商品在庫数が少なくなっています。')
        //         ->view('buy/guest/adminMail')
        //         ->with($item_inventory);
                Log::info('開始');
            Mail::to('tksmjf@icloud.com')->send(new InventoryMail());
                Log::info('完了');
        // }
        
        // Log::info('キュー実行完了');
        
    }
}
