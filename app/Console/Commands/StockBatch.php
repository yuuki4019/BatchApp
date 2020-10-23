<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArrivalShipment;
use App\Models\Stock;

class StockBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Stock:batch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stockテーブルの在庫計算コマンド';

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
        echo "Stockテーブルの在庫計算プログラムを実施します","\n";
        // $stocks = Stock::where('item_id', '10001')->get();
        $stocks = Stock::where('item_id', '10001')->value('item_stock');
        dump($stocks);

        $items = ArrivalShipment::where('item_id', '10001')->get();
        $sum = 0;

        foreach ($items as $item) {
            if($item->arrival_shipment == 'arrival'){
                $sum += $item->item_num;
            }
            if($item->arrival_shipment == 'shipment'){
                $sum -= $item->item_num;
            }
        }
        $stocks = $sum;
        dump($stocks);
        $stocks->save();

        echo "Stockテーブルの在庫計算プログラムを完了しました", "\n"; 
        return 0;
    }
}
