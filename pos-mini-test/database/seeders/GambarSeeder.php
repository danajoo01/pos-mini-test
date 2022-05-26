<?php

namespace Database\Seeders;

use App\Models\Gambar;
use Illuminate\Database\Seeder;

class GambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'paket-advance.png',
            'paket-desktop.png',
            'paket-lifestyle.png',
            'paket_repo.png',
        ];

        foreach ($items as $item) {
            Gambar::create([
                'nama' => $item,
            ]);
        }
    }
}
