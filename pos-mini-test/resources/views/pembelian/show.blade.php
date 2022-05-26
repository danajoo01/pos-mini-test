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
                        <td>Tanggal</td>
                        <td>{{ $pembelian->tanggal }}</td>
                    </tr>
                    <tr>
                        <td>Suplier</td>
                        <td>{{ $pembelian->suplier->nama }}</td>
                    </tr>
                    <tr>
                        <td>Produk</td>
                        <td>{{ $pembelian->produk->nama }}</td>
                    </tr>                    
                    <tr>
                        <td>Total</td>
                        <td>{{ $pembelian->total }}</td>
                    </tr>
                </tbody>
            </table>
            <x-slot name="footer">
                <a href="{{ route('pembelian.edit', ['pembelian' => $pembelian->id]) }}" class="btn btn-primary">Edit</a>
            </x-slot>
        </x-card>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pembelian.index') }}">Pembelian</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>
@endsection
