<?php

namespace App\DataTables;

use App\Product;
use App\User;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action',function($row) {
                return '<a href="'.route('products.edit',$row->id).'" class="waves-effect waves-light btn-small"><i class="lighten-3 material-icons">edit</i></a>'
                .'<a href="'.route('products.destroy',$row->id).'" class="waves-effect waves-light btn-small"><i class="lighten-3 material-icons">delete</i></a>'
                .'<a href="'.route('products.show',$row->id).'" class="waves-effect waves-light btn-small"><i class="lighten-3 material-icons">remove_red_eye</i></a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return Product::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name',
            'price'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product_' . date('YmdHis');
    }
}
