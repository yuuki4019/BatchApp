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

        // Stockテーブルのitems_idをすべて取得 ただし、重複分は不要
        $stocks = Stock::get('item_id');
        // dd($stocks);


        // items_idの数だけ下の処理を繰り返す(foreach)
        foreach($stocks as $stock)
        {
            echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";

            // 配列からitem_idの情報のみを取り出す
            $id = $stock->item_id;
            dump($id);

            // ArrivalShipmentテーブルから本ループで計算するのに必要なデータのみを取り出す
            $items = ArrivalShipment::where('item_id', $id)->get();
            // dump($items);

            // 在庫の計算
            $sum = 0;
            foreach($items as $item)
            {
                if($item->arrival_shipment == 'arrival'){
                    $sum += $item->item_num;
                }
                if($item->arrival_shipment == 'shipment'){
                    $sum -= $item->item_num;
                }
            }
            $stock->item_stock = $sum;
            dump($stocks);
            $stock->save();
        }

        echo "Stockテーブルの在庫計算プログラムを完了しました", "\n"; 
        return 0;

// 変更前 20201029
        // $stocks_10001 = Stock::where('item_id', '10001')->first();
        // $items_10001 = ArrivalShipment::where('item_id', '10001')->get();
        // $sum_10001 = 0;

        // $stocks_10002 = Stock::where('item_id', '10002')->first();
        // $items_10002 = ArrivalShipment::where('item_id', '10002')->get();
        // $sum_10002 = 0;


        // foreach ($items_10001 as $item) {
        //     if($item->arrival_shipment == 'arrival'){
        //         $sum_10001 += $item->item_num;
        //     }
        //     if($item->arrival_shipment == 'shipment'){
        //         $sum_10001 -= $item->item_num;
        //     }
        // }
        // //代入する時はカラム指定する
        // $stocks_10001->item_stock = $sum_10001;
        // //saveメソッドは配列を保存できないので注意
        // $stocks_10001->save();

        // foreach ($items_10002 as $item) {
        //     if($item->arrival_shipment == 'arrival'){
        //         $sum_10002 += $item->item_num;
        //     }
        //     if($item->arrival_shipment == 'shipment'){
        //         $sum_10002 -= $item->item_num;
        //     }
        // } 

        // $stocks_10002->item_stock = $sum_10002;
        // $stocks_10002->save();

        // dump($stocks_10001->item_stock);
        // dump($stocks_10002->item_stock);

        // echo "Stockテーブルの在庫計算プログラムを完了しました", "\n"; 
        // return 0;
    }
}
