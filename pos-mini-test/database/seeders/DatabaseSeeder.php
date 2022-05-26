<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(GambarSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(SuplierSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
