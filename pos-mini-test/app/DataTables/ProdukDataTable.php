<?php

namespace App\DataTables;

use App\Models\Produk;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProdukDataTable extends DataTable
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
            ->addColumn('action', 'produk.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Produk $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Produk $model)
    {
        return $model->newQuery()->selectRaw('produk.id, produk.nama, kategori.nama as kategori')->leftJoin('kategori', 'kategori.id', 'produk.kategori_id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('produk-table')
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
            Column::make('id')->title('ID'),
            Column::make('nama'),
            Column::make('kategori')->name('kategori.nama'),
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
        return 'Produk_'.date('YmdHis');
    }
}
