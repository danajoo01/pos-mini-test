@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-card>
            <x-slot name="header">
                Edit Pelanggan
            </x-slot>

            <x-form class="mb-4" method="patch" action="{{ route('pelanggan.update', ['pelanggan' => $pelanggan->id]) }}">
                <x-form-input name="nama" label="Nama" :value="$pelanggan->nama" />
                    <x-form-input name="kontak" label="Kontak" :value="$pelanggan->kontak" />

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
        <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection
