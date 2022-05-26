<?php

namespace App\Http\Controllers;

use App\DataTables\PenjualanDataTable;
use App\Http\Requests\PenjualanRequest;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenjualanDataTable $penjualanDataTable)
    {
        return $penjualanDataTable->render('penjualan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggan = Pelanggan::selectRaw('id, nama')->get();
        $produk = Produk::selectRaw('id, nama')->get();

        return view('penjualan.create', [
            'pelanggan' => $pelanggan,
            'produk'    => $produk,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PenjualanRequest $request)
    {
        $request->merge([
            'user_id' => auth()->id(),
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Penjualan $penjualan
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        return view('penjualan.show', [
            'penjualan' => $penjualan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Penjualan $penjualan
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        $pelanggan = Pelanggan::selectRaw('id, nama')->get();
        $produk = Produk::selectRaw('id, nama')->get();

        return view('penjualan.edit', [
            'pelanggan' => $pelanggan,
            'produk'    => $produk,
            'penjualan' => $penjualan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Penjualan    $penjualan
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PenjualanRequest $request, Penjualan $penjualan)
    {
        $penjualan->update($request->all());

        return redirect()->back()->with('success', 'Penjualan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Penjualan $penjualan
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan Berhasil Dihapus');
    }
}
