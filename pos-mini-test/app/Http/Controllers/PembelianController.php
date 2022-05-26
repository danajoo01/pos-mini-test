<?php

namespace App\Http\Controllers;

use App\DataTables\PembelianDataTable;
use App\Http\Requests\PembelianRequest;
use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\Suplier;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PembelianDataTable $pembelianDataTable)
    {
        return $pembelianDataTable->render('pembelian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suplier = Suplier::selectRaw('id, nama')->get();
        $produk = Produk::selectRaw('id, nama')->get();

        return view('pembelian.create', [
            'suplier' => $suplier,
            'produk'  => $produk,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PembelianRequest $request)
    {
        $request->merge([
            'user_id' => auth()->id(),
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Pembelian Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Pembelian $pembelian
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        return view('pembelian.show', [
            'pembelian' => $pembelian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Pembelian $pembelian
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        $suplier = Suplier::selectRaw('id, nama')->get();
        $produk = Produk::selectRaw('id, nama')->get();

        return view('pembelian.edit', [
            'pembelian' => $pembelian,
            'suplier'   => $suplier,
            'produk'    => $produk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pembelian    $pembelian
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PembelianRequest $request, Pembelian $pembelian)
    {
        $pembelian->update($request->all());

        return redirect()->back()->with('success', 'Pembelian Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Pembelian $pembelian
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian Berhasil Dihapus');
    }
}
