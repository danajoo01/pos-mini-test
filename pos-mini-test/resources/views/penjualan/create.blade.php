@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-card>
            <x-slot name="header">
                Tambah Penjualan
            </x-slot>
            <x-form action="{{ route('penjualan.store') }}">
                <x-form-input name="tanggal" label="Tanggal" type="date" />
                <x-form-select name="produk_id" label="Produk" id="select-produk">
                    @foreach ($produk as $item)
                        <option value="{{ $item->id }}" @if ($item->id == old('produk_id')) selected @endif>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </x-form-select>
                <x-form-select name="pelanggan_id" label="Pelanggan" id="select-pelanggan">
                    @foreach ($pelanggan as $item)
                        <option value="{{ $item->id }}" @if ($item->id == old('pelanggan_id')) selected @endif>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </x-form-select>
                <x-form-input name="total" label="Total" type="number" />

                <x-form-submit id="form-submit" hidden />
            </x-form>

            <x-slot name="footer">
                <a class="btn btn-primary" href="#"
                    onclick="event.preventDefault(); document.getElementById('form-submit').click();">
                    Simpan
                </a>
            </x-slot>
        </x-card>

    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('penjualan.index') }}">Penjualan</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection
