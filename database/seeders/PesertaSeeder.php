<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peserta;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // INSERT INTO
        // Peserta::create([
        //     'name' => 'Fariz Irvansyah',
        //     'email' => 'fariz.irvansyah@gmail.com',
        //     'age' => 25,
        //     'address' => 'Jakarta Selatan',
        // ]);

        // INSERT FAKER
        Peserta::factory(500)->create();
    }
}
