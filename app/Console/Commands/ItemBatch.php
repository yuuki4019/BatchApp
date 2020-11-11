<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;

class ItemBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Item:batch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Itemテーブルの合計金額計算コマンド';

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
     * @return int
     */
    public function handle()
    {
        echo "Itemテーブルの合計金額計算プログラムを実施します"."\n";
        $items = Item::whereNull('total_price')->get();
        foreach($items as $item){
        $item->total_price = $item->price * $item->num;
        $item->save();
        }
        echo "Itemテーブルの合計金額計算プログラムを完了しました";
       
    }}
