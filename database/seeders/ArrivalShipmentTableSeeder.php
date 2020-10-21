<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArrivalShipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $arrival_shipment = new \App\Models\ArrivalShipment([
            'item_id' => '10001',
            'arrival_shipment' => 'arrival',
            'item_num' => 50
        ]);
        $arrival_shipment->save();

        $arrival_shipment = new \App\Models\ArrivalShipment([
            'item_id' => '10002',
            'arrival_shipment' => 'arrival',
            'item_num' => 40
        ]);
        $arrival_shipment->save();

        $arrival_shipment = new \App\Models\ArrivalShipment([
            'item_id' => '10001',
            'arrival_shipment' => 'shipment',
            'item_num' => 5
        ]);
        $arrival_shipment->save();

        $arrival_shipment = new \App\Models\ArrivalShipment([
            'item_id' => '10002',
            'arrival_shipment' => 'shipment',
            'item_num' => 10
        ]);
        $arrival_shipment->save();

        $arrival_shipment = new \App\Models\ArrivalShipment([
            'item_id' => '10001',
            'arrival_shipment' => 'shipment',
            'item_num' => 10
        ]);
        $arrival_shipment->save();

        $arrival_shipment = new \App\Models\ArrivalShipment([
            'item_id' => '10001',
            'arrival_shipment' => 'shipment',
            'item_num' => 13
        ]);
        $arrival_shipment->save();

        $arrival_shipment = new \App\Models\ArrivalShipment([
            'item_id' => '10002',
            'arrival_shipment' => 'shipment',
            'item_num' => 7
        ]);
        $arrival_shipment->save();

    }
}
