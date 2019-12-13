<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class QuantityAdminMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
              $signature：artisanコマンドとして登録するときの識別子*/
    protected $signature = 'command:quantity_admin_mail';

    /**
     * The console command description.
     *
     * @var string
              $description：コマンドの説明*/
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
                    handle実際の処理を書きこむ*/
    public function handle()
    {
        Log::info('コマンド実行開始');

        Mail::to('tksmjf@icloud.com')->send(new InventoryMail($_itemArray));

        Log::info('コマンド実行完了');
    }
}
