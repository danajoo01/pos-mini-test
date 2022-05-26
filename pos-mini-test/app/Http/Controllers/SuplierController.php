<?php

namespace App\Http\Controllers;

use App\DataTables\SuplierDataTable;
use App\Http\Requests\SuplierRequest;
use App\Models\Suplier;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SuplierDataTable $suplierDataTable)
    {
        return $suplierDataTable->render('suplier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SuplierRequest $request)
    {
        Suplier::create($request->all());

        return redirect()->route('suplier.index')->with('success', 'Suplier Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param App\Models\Suplier $suplier
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Suplier $suplier)
    {
        return view('suplier.show', [
            'suplier' => $suplier,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Suplier $suplier
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Suplier $suplier)
    {
        return view('suplier.edit', [
            'suplier' => $suplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Suplier      $suplier
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SuplierRequest $request, Suplier $suplier)
    {
        $suplier->update($request->all());

        return redirect()->back()->with('success', 'Suplier Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Suplier $suplier
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suplier $suplier)
    {
        $suplier->delete();

        return redirect()->route('suplier.index')->with('success', 'Suplier Berhasil Dihapus');
    }
}
