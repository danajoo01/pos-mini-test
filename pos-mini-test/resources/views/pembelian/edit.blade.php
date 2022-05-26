@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-card>
            <x-slot name="header">
                Edit Pembelian
            </x-slot>

            <x-form class="mb-4" method="patch" action="{{ route('pembelian.update', ['pembelian' => $pembelian->id]) }}">
                <x-form-input name="tanggal" label="Tanggal" type="date" :value="$pembelian->tanggal" />
                <x-form-select name="produk_id" label="Produk" id="select-produk">
                    @foreach ($produk as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $pembelian->produk_id) selected @endif>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </x-form-select>
                <x-form-select name="suplier_id" label="Suplier" id="select-suplier">
                    @foreach ($suplier as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $pembelian->suplier_id) selected @endif>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </x-form-select>
                <x-form-input name="total" label="Total" type="number" :value="$pembelian->total" />

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
        <li class="breadcrumb-item"><a href="{{ route('pembelian.index') }}">Pembelian</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection
