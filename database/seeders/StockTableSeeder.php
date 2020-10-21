<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $stock = new \App\Models\Stock([
            'item_id' => '10001',
            'item_stock' => 0
        ]);
        $stock->save();

        $stock = new \App\Models\Stock([
            'item_id' => '10002',
            'item_stock' => 0
        ]);
        $stock->save();
    }
}
