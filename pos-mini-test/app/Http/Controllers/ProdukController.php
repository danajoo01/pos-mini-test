<?php

namespace App\Http\Controllers;

use App\DataTables\ProdukDataTable;
use App\Http\Requests\ProdukRequest;
use App\Models\Kategori;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProdukDataTable $produkDataTable)
    {
        return $produkDataTable->render('produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::selectRaw('id, nama')->get();

        return view('produk.create', [
            'kategori' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        Produk::create($request->all());

        return redirect()->route('produk.index')->with('success', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Produk $produk
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('produk.show', [
            'produk' => $produk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Produk $produk
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategori = Kategori::selectRaw('id, nama')->get();

        return view('produk.edit', [
            'produk'   => $produk,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Produk       $produk
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, Produk $produk)
    {
        $produk->update($request->all());

        return redirect()->back()->with('success', 'Produk Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Produk $produk
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk Berhasil Dihapus');
    }
}
