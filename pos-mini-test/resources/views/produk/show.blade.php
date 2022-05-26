@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-card>
            <x-slot name="header">Detail</x-slot>
            <table class="table table-striped table-bordered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>{{ $produk->nama }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>{!! $produk->deskripsi !!}</td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>{{ number_format($produk->harga) }}</td>
                    </tr>
                </tbody>
            </table>
            <x-slot name="footer">
                <a href="{{ route('produk.edit', ['produk' => $produk->id]) }}" class="btn btn-primary">Edit</a>
            </x-slot>
        </x-card>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
@endsection
