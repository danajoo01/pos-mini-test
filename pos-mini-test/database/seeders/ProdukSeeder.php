<?php

namespace Database\Seeders;

use App\Models\Gambar;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
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
                'kategori'  => 'Paket Advance',
                'nama'      => 'Majoo Advance',
                'harga'     => 2750000,
                'deskripsi' => 'Lorem ipsum dolor sit amet, an luptatum intellegam nec, at tractatos omittantur duo. Sea ea mutat integre. At labore nonumes mea. Doming possit postulant ad his, vix te legere legimus offendit, ei vero eripuit abhorreant usu. Rebum animal periculis ad has.',
                'gambar'    => 'paket-advance.png',
            ],
            [
                'kategori'  => 'Paket Desktop',
                'nama'      => 'Majoo Desktop',
                'harga'     => 2750000,
                'deskripsi' => 'Lorem ipsum dolor sit amet, an luptatum intellegam nec, at tractatos omittantur duo. Sea ea mutat integre. At labore nonumes mea. Doming possit postulant ad his, vix te legere legimus offendit, ei vero eripuit abhorreant usu. Rebum animal periculis ad has.',
                'gambar'    => 'paket-desktop.png',
            ],
            [
                'kategori'  => 'Paket Lifestyle',
                'nama'      => 'Majoo Lifestyle',
                'harga'     => 2750000,
                'deskripsi' => 'Lorem ipsum dolor sit amet, an luptatum intellegam nec, at tractatos omittantur duo. Sea ea mutat integre. At labore nonumes mea. Doming possit postulant ad his, vix te legere legimus offendit, ei vero eripuit abhorreant usu. Rebum animal periculis ad has.',
                'gambar'    => 'paket-lifestyle.png',
            ],
            [
                'kategori'  => 'Paket Repo',
                'nama'      => 'Majoo Repo',
                'harga'     => 2750000,
                'deskripsi' => 'Lorem ipsum dolor sit amet, an luptatum intellegam nec, at tractatos omittantur duo. Sea ea mutat integre. At labore nonumes mea. Doming possit postulant ad his, vix te legere legimus offendit, ei vero eripuit abhorreant usu. Rebum animal periculis ad has.',
                'gambar'    => 'paket_repo.png',
            ],
        ];

        foreach ($items as $item) {
            $kategori_id = Kategori::where('nama', $item['kategori'])->value('id');
            $gambar_id = Gambar::where('nama', $item['gambar'])->value('id');
            Produk::updateOrCreate([
                'kategori_id' => $kategori_id,
                'nama'        => $item['nama'],
            ], [
                'harga'     => $item['harga'],
                'deskripsi' => $item['deskripsi'],
                'gambar_id' => $gambar_id,
            ]);
        }
    }
}
