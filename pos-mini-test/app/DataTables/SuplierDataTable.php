<?php

namespace App\DataTables;

use App\Models\Suplier;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SuplierDataTable extends DataTable
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
            ->addColumn('action', 'suplier.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Suplier $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Suplier $model)
    {
        return $model->newQuery()->selectRaw('id, nama');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('suplier-table')
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
        return 'Suplier_'.date('YmdHis');
    }
}
