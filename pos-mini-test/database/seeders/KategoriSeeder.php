<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
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
                'nama' => 'Paket Desktop',
            ],
            [
                'nama' => 'Paket Starter Lite',
            ],
            [
                'nama' => 'Paket Advance Galaxy',
            ],
            [
                'nama' => 'Paket Starter Sprinter',
            ],
        ];

        foreach ($items as $item) {
            Kategori::create([
                'nama' => $item['nama'],
            ]);
        }
    }
}
