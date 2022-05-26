@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            @foreach ($produk as $item)
                <div class="col-md-4 mb-4">
                    <x-card class="h-100 text-center">
                        <div>
                            <div class="mb-4">
                                @if (!!$item->gambar)
                                    <img src='{{ asset('uploads/' . $item->gambar->nama) }}' class="card-img">
                                @else
                                    -
                                @endif
                            </div>
                            <div class="mb-4">
                                <h6>{{ $item->nama }}</h6>
                                <p class="font-weight-bold">Rp {{ number_format($item->harga) }}</p>
                            </div>
                            <div>
                                {!! $item->deskripsi !!}
                            </div>
                        </div>
                        <x-slot name="footer">
                            <button class="btn btn-primary btn-block produk" type="button" data-toggle="modal"
                                data-target="#keranjang" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}">
                                Beli
                            </button>
                        </x-slot>
                    </x-card>
                </div>
            @endforeach
        </div>

        {{ $produk->links() }}
    </div>

    <div class="modal fade show" id="keranjang" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="nama_produk"></h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <x-form action="{{ route('penjualan.store') }}">
                    <div class="modal-body">
                        <div class="d-block">
                            <x-form-select name="pelanggan_id" label="Pelanggan" id="select-pelanggan">
                                @foreach ($pelanggan as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == old('pelanggan_id')) selected @endif>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </x-form-select>
                        </div>
                        <x-form-input name="total" label="Total" type="number" value="1" />
                        <x-form-input name="tanggal" type="date" value="{{ date('Y-m-d') }}" hidden />
                        <x-form-input name="produk_id" id="produk_id" hidden />
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Produk</li>
    </ol>
@endsection

@push('page_scripts')
    <script>
        $(".produk").click(function() {
            const produk_id = $(this).data("id");
            $('#produk_id').val(produk_id);

            const nama = $(this).data("nama");
            $('#nama_produk').html(nama);

            console.log(produk_id, nama);
        });
    </script>
@endpush

@push('page_css')
    <style>
        .select2-container,
        .form-col-form-label {
            display: block !important;
        }

    </style>
@endpush
