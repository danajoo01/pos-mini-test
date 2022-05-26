@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-sm-6">
                <x-card class="bg-primary text-white">
                    <div class="pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg">{{ $penjualan ?? 0 }}</div>
                            <div>Total Penjualan</div>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="cil-settings"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('penjualan.index') }}">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
            <div class="col-sm-6">
                <x-card class="bg-warning text-white">
                    <div class="pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg">{{ $pembelian ?? 0 }}</div>
                            <div>Total Pembelian</div>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="cil-settings"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('pembelian.index') }}">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>

        <x-card>
            <div class="overflow-hidden">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">Transaksi</h4>
                        <div class="small text-muted">Statistik Bulan Ini</div>
                    </div>
                </div>

                <div class="c-chart-wrapper" style="height: 300px; margin-top: 40px">
                    <canvas class="chart" id="main-chart" height="300"></canvas>
                </div>
            </div>
        </x-card>
    </div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item active">Home</li>
    </ol>
@endsection

@section('third_party_scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script>
    <script src="{{ asset('js/coreui-chartjs.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
@endsection

@push('page_scripts')
    <script>
        new Chart(document.getElementById('main-chart'), {
            type: 'line',
            data: {
                labels: [{!! $tanggal !!}],
                datasets: [{
                        label: 'Penjualan',
                        backgroundColor: coreui.Utils.hexToRgba(coreui.Utils.getStyle('--info'), 10),
                        borderColor: coreui.Utils.getStyle('--info'),
                        pointHoverBackgroundColor: '#fff',
                        borderWidth: 2,
                        data: [{!! $grafik['penjualan'] ?? 0 !!}]
                    },
                    {
                        label: 'Pembelian',
                        backgroundColor: 'transparent',
                        borderColor: coreui.Utils.getStyle('--success'),
                        pointHoverBackgroundColor: '#fff',
                        borderWidth: 2,
                        data: [{!! $grafik['pembelian'] ?? 0 !!}]
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            drawOnChartArea: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            stepSize: Math.ceil({!! max(array_merge(explode(',', $grafik['penjualan']), explode(',', $grafik['pembelian']))) + 3 !!} / 3),
                            max: {!! max(array_merge(explode(',', $grafik['penjualan']), explode(',', $grafik['pembelian']))) + 3 !!}
                        }
                    }]
                },
                elements: {
                    point: {
                        radius: 0,
                        hitRadius: 10,
                        hoverRadius: 4,
                        hoverBorderWidth: 3
                    }
                },
                tooltips: {
                    intersect: true,
                    callbacks: {
                        labelColor: function(tooltipItem, chart) {
                            return {
                                backgroundColor: chart.data.datasets[tooltipItem.datasetIndex].borderColor
                            };
                        }
                    }
                }
            }
        })
    </script>
@endpush
