<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::insert([
        //     [
        //         'name' => 'Nasi Putih',
        //         'category_id' => 1,
        //         'price' => 5000
        //     ],
        //     [
        //         'name' => 'Air Mineral',
        //         'category_id' => 2,
        //         'price' => 5000
        //     ],
        //     [
        //         'name' => 'Gantungan Kunci',
        //         'category_id' => 3,
        //         'price' => 5000
        //     ]
        // ]);

        Product::create([
            'name' => 'Nasi Putih',
            'category_id' => 1,
            'price' => 5000
        ]);
        Product::create([
            'name' => 'Air Mineral',
            'category_id' => 2,
            'price' => 5000
        ]);
        Product::create([
            'name' => 'Gantungan Kunci',
            'category_id' => 3,
            'price' => 5000
        ]);
    }
}
