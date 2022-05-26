<?php

namespace App\Http\Controllers;

use App\Http\Requests\GambarRequest;
use App\Models\Gambar;

class GambarController extends Controller
{
    public function upload(GambarRequest $request)
    {
        $nama = time().'.'.request()->file->getClientOriginalExtension();
        $request->file->move(public_path('uploads'), $nama);

        $file = new Gambar();
        $file->nama = $nama;
        $file->save();

        return response()->json([
            'message' => 'Gambar berhasil ditambahkan.',
            'data'    => $file->id,
        ]);
    }
}
