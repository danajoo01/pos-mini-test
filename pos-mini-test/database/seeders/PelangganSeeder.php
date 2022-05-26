<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
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
                'nama'   => 'Pelanggan1',
                'kontak' => '081575768529',
            ],
            [
                'nama'   => 'Pelangga2',
                'kontak' => '08123456789',
            ],
        ];

        foreach ($items as $item) {
            Pelanggan::create([
                'nama'   => $item['nama'],
                'kontak' => $item['kontak'],
            ]);
        }
    }
}
