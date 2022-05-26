<?php

namespace App\Http\Controllers;

use App\DataTables\PelangganDataTable;
use App\Http\Requests\PelangganRequest;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PelangganDataTable $pelangganDataTable)
    {
        return $pelangganDataTable->render('pelanggan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PelangganRequest $request)
    {
        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Pelanggan $pelanggan
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('pelanggan.show', [
            'pelanggan' => $pelanggan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Pelanggan $pelanggan
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', [
            'pelanggan' => $pelanggan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pelanggan    $pelanggan
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PelangganRequest $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());

        return redirect()->back()->with('success', 'Pelanggan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Pelanggan $pelanggan
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan Berhasil Dihapus');
    }
}
