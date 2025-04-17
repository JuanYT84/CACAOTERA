<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run()
    {
        $inventories = [
            [
                'cacao_type' => 'Cacao Criollo',
                'quantity' => 750,
                'status' => 'Óptimo',
            ],
            [
                'cacao_type' => 'Cacao Forastero',
                'quantity' => 450,
                'status' => 'Bajo',
            ],
            [
                'cacao_type' => 'Cacao Trinitario',
                'quantity' => 900,
                'status' => 'Óptimo',
            ],
            [
                'cacao_type' => 'Cacao Orgánico',
                'quantity' => 600,
                'status' => 'Óptimo',
            ],
        ];

        foreach ($inventories as $inventory) {
            Inventory::create($inventory);
        }
    }
}