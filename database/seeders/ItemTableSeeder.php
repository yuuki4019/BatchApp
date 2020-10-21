<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $item = new \App\Models\Item([
            'item_id' => '10001',
            'price' => 199,
            'num' => 100
            ]);
            $item->save();
            
            $item = new \App\Models\Item([
            'item_id' => '10002',
            'price' => 299,
            'num' => 99
            ]);
            $item->save();
            
            $item = new \App\Models\Item([
            'item_id' => '10003',
            'price' => 398,
            'num' => 89
            ]);
            $item->save();
            
            $item = new \App\Models\Item([
            'item_id' => '10004',
            'price' => 1002,
            'num' => 56
            ]);
            $item->save();
            
            $item = new \App\Models\Item([
            'item_id' => '10005',
            'price' => 586,
            'num' => 44
            ]);
            $item->save();
            
            $item = new \App\Models\Item([
            'item_id' => '10006',
            'price' => 456,
            'num' => 33
            ]);
            $item->save();
            
            $item = new \App\Models\Item([
            'item_id' => '10007',
            'price' => 234,
            'num' => 22
            ]);
            $item->save();



    }
}
