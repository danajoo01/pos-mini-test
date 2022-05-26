<?php

namespace App\DataTables;

use App\Models\Pembelian;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PembelianDataTable extends DataTable
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
            ->addColumn('action', 'pembelian.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Pembelian $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pembelian $model)
    {
        $user = auth()->user();

        return $model->newQuery()
            ->selectRaw('pembelian.id, pembelian.tanggal, pembelian.total, produk.nama as produk, suplier.nama as suplier, users.name as user')
            ->when(!$user->is_admin, function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->leftJoin('produk', 'produk.id', 'pembelian.produk_id')
            ->leftJoin('users', 'users.id', 'pembelian.user_id')
            ->leftJoin('suplier', 'suplier.id', 'pembelian.suplier_id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('pembelian-table')
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
            Column::make('suplier')->name('suplier.nama'),
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
        return 'Pembelian_'.date('YmdHis');
    }
}
