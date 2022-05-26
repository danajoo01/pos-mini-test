<?php

namespace Database\Seeders;

use App\Models\Suplier;
use Illuminate\Database\Seeder;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'nama' => 'PT ABC',
            ],
            [
                'nama' => 'PT XYZ',
            ],
        ];

        foreach ($items as $item) {
            Suplier::create([
                'nama' => $item['nama'],
            ]);
        }
    }
}
