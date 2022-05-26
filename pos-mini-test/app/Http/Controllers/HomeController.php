<?php

namespace App\Http\Controllers;

use App\Helper\DateFormater;
use App\Helper\StringFormater;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Init Data
        $user = auth()->user();
        $start = date('Y-m-01');
        $end = date('Y-m-t');

        // Get Data
        $data = $this->getData($user, $start, $end);

        return view('home.dashboard', $data);
    }

    /**
     * Menampilkan halaman list produk.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function keranjang()
    {
        $produk = Produk::paginate(3);
        $pelanggan = Pelanggan::selectRaw('id, nama')->get();

        return view('home.keranjang', [
            'produk'    => $produk,
            'pelanggan' => $pelanggan,
        ]);
    }

    /**
     * Menampilkan laporan penjualan.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function penjualan()
    {
        $penjualan = Penjualan::sum('total');
        $produk = Penjualan::select(DB::raw('produk.nama as produk, SUM(penjualan.total) as total'))->leftJoin('produk', 'produk.id', 'penjualan.produk_id')->groupBy('produk')->get();

        return view('laporan.penjualan', [
            'penjualan' => $penjualan,
            'produk'    => $produk,
        ]);
    }

    /**
     * Menampilkan laporan pembelian.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pembelian()
    {
        $pembelian = Pembelian::sum('total');
        $produk = Pembelian::select(DB::raw('produk.nama as produk, SUM(pembelian.total) as total'))->leftJoin('produk', 'produk.id', 'pembelian.produk_id')->groupBy('produk')->get();

        return view('laporan.pembelian', [
            'pembelian' => $pembelian,
            'produk'    => $produk,
        ]);
    }

    /**
     * Get Data Transaksi.
     *
     * @param object $user
     * @param string $start
     * @param string $end
     *
     * @return array
     */
    private function getData($user, $start, $end)
    {
        // Tanggal
        $date_between = DateFormater::between($start, $end);
        $tanggal = StringFormater::arrayToString($date_between);

        // Card Data
        $total_pembelian = Pembelian::select(DB::raw('SUM(total) as total'))->when(!$user->is_admin, function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereBetween('tanggal', [$start, $end])->value('total');

        $total_penjualan = Penjualan::select(DB::raw('SUM(total) as total'))->when(!$user->is_admin, function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereBetween('tanggal', [$start, $end])->value('total');

        // Grafik
        $penjualan = Penjualan::select(DB::raw('DATE(tanggal) as tanggal, SUM(total) as total'))
            ->when(!$user->is_admin, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->whereBetween('tanggal', [$start, $end])
            ->groupBy('tanggal')
            ->get()
            ->toArray();

        $data_penjualan = StringFormater::formatDate($penjualan, $date_between);

        $pembelian = Pembelian::select(DB::raw('DATE(tanggal) as tanggal, SUM(total) as total'))
            ->when(!$user->is_admin, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->whereBetween('tanggal', [$start, $end])
            ->groupBy('tanggal')
            ->get()
            ->toArray();

        $data_pembelian = StringFormater::formatDate($pembelian, $date_between);

        return [
            'penjualan' => $total_penjualan,
            'pembelian' => $total_pembelian,
            'tanggal'   => $tanggal,
            'grafik'    => [
                'penjualan' => $data_penjualan,
                'pembelian' => $data_pembelian,
            ],
        ];
    }
}
