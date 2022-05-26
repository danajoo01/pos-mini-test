@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    {!! $dataTable->table(['class' => 'table table-striped table-bordered nowrap'], false) !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Pelanggan</li>
    </ol>
@endsection

@section('third_party_scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
@endsection

@push('page_scripts')
    {{ $dataTable->scripts() }}
@endpush
