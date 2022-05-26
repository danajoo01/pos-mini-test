<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Http\Requests\KategoriRequest;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(KategoriDataTable $kategoriDataTable)
    {
        return $kategoriDataTable->render('kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriRequest $request)
    {
        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Kategori $kategori
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return view('kategori.show', [
            'kategori' => $kategori,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Kategori $kategori
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kategori     $kategori
     *
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $kategori->update($request->all());

        return redirect()->back()->with('success', 'Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Kategori $kategori
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori Berhasil Dihapus');
    }
}
