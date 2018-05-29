<?php

namespace App\DataTables;

use App\TypeProduct;
use App\User;
use Yajra\DataTables\Services\DataTable;

class TypeProductDataTable extends DataTable
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
            ->editColumn('action',function($row) {
                return '<a href="'.route('type-products.edit',$row->id).'" class="left waves-effect waves-light btn-small"><i class="lighten-3 material-icons">edit</i></a>'
                .\Form::open(["url" => route('type-products.destroy',$row->id),"class"=>"left"]).
                    '<input type="hidden" name="_method" value="DELETE">'.
                    '<a role="submit" onClick="return isValid(this)" class="waves-effect waves-light btn-small"><i class="lighten-3 material-icons">delete</i></a>'.
                    \Form::close();
            })->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return TypeProduct::query();
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
                    //->minifiedAjax()
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
            'id'=> ['title'=>'ID'],
            'name'=> ['title'=>'Nombre'],
            'description'=> ['title'=>'Descripcion'],
            'action'=>['title'=>'Acciones']
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
