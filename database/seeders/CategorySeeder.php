<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::insert([
        //     [
        //         'name' => 'Makanan',
        //         'is_active' => true,
        //     ],
        //     [
        //         'name' => 'Minuman',
        //         'is_active' => true,
        //     ],
        //     [
        //         'name' => 'Mainan',
        //         'is_active' => true
        //     ]
        // ]);

        Category::create([
            'name' => 'Makanan',
            'is_active' => true
        ]);
        Category::create([
            'name' => 'Minuman',
            'is_active' => true
        ]);
        Category::create([
            'name' => 'Mainan',
            'is_active' => true
        ]);
    }
}
