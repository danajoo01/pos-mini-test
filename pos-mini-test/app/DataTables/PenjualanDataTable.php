<?php

namespace App\DataTables;

use App\Models\Penjualan;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PenjualanDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'penjualan.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Penjualan $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Penjualan $model)
    {
        $user = auth()->user();

        return $model->newQuery()
            ->selectRaw('penjualan.id, penjualan.tanggal, penjualan.total, produk.nama as produk, pelanggan.nama as pelanggan, users.name as user')
            ->when(!$user->is_admin, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->leftJoin('produk', 'produk.id', 'penjualan.produk_id')
            ->leftJoin('users', 'users.id', 'penjualan.user_id')
            ->leftJoin('pelanggan', 'pelanggan.id', 'penjualan.pelanggan_id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('penjualan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('B<"d-flex justify-content-between align-items-center mt-4 mb-2 border-top pt-4"lf><tr><"mt-3 d-flex justify-content-between align-items-center"ip>')
            ->orderBy(0)
            ->buttons(
                Button::make('create'),
                Button::make('print'),
                Button::make('reset')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('tanggal'),
            Column::make('pelanggan')->name('pelanggan.nama'),
            Column::make('produk')->name('produk.nama'),
            Column::make('total'),
            Column::make('user')->name('user.name'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Penjualan_'.date('YmdHis');
    }
}
