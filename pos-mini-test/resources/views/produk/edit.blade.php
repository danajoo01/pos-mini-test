@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-card>
            <x-slot name="header">
                Edit Produk
            </x-slot>

            <x-form class="mb-4" method="patch" action="{{ route('produk.update', ['produk' => $produk->id]) }}">
                <x-form-input name="nama" label="Nama" :value="$produk->nama" />
                <x-form-select name="kategori_id" label="Kategori" id="select2">
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}" @if ($item->id == old('kategori_id')) selected @endif>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </x-form-select>
                <x-form-textarea name="deskripsi" label="Deskrikpsi" id="editor">{!! $produk->deskripsi !!}</x-form-textarea>
                <x-form-input name="harga" label="Harga" type="number" :value="$produk->harga" />
                <x-form-input name="gambar_id" id="gambar_id" :value="$produk->gambar_id" hidden />
                <x-form-submit id="form-submit" hidden />
            </x-form>

            <form method="post" id="upload-image-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-col-form-label">Gambar</label>
                    <input type="file" name="file" class="form-control" id="image-input">
                    <span class="text-danger" id="image-input-error"></span>
                    <span class="text-success" id="image-input-success"></span>
                </div>
                <div class="form-group">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                    </div>
                </div>
            </form>

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
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@push('page_scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#image-input").change(function() {
            $(this).closest("form").submit();
        });

        $('#upload-image-form').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#image-input-error').text('');
            $('#image-input-success').text('');

            $.ajax({
                type: 'POST',
                url: `/gambar`,
                data: formData,
                contentType: false,
                processData: false,
                xhr: function() {
                    let xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            let percentComplete = (evt.loaded / evt.total) * 100;
                            $('.progress .progress-bar').css("width", percentComplete + '%',
                                function() {
                                    return $(this).attr("aria-valuenow", percentComplete) +
                                        "%";
                                })
                        }
                    }, false);
                    return xhr;
                },
                success: (response) => {
                    if (response) {
                        console.log(response.data);
                        $('#gambar_id').val(response.data);
                        $('#image-input-success').text(response.message);
                        // this.reset();
                    }
                },
                error: function(response) {
                    $('#image-input-error').text(response.responseJSON.errors.file);
                }
            });
        });
    </script>
@endpush
