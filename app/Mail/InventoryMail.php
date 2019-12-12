<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Item;

class InventoryMail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected static $_itemArray; //$_はインスタンス変数 static宣言は、インスタンス化せずその変数にアクセスできる　メモリ上に残り続ける

    public function _addItemArray()
    {
    }
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($itemArray)
    {
        $_itemArray = $itemArray;
    }
    
    //$_itemArrayの受け取り
    public function getitemArray()
    {
        return $this->_itemArray;
    }
    
    //$_itemArrayに代入する
    public function setitemArray($_itemArray)
    {
        $this->_itemArray = $_itemArray;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('buy.inventoryMail', [ 'itemArray' => $_itemArray ]);
    }
}