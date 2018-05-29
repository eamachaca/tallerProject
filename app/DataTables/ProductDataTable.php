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
            ->editColumn('action',function($row) {
                return '<a href="'.route('products.edit',$row->id).'" class="left waves-effect waves-light btn-small"><i class="lighten-3 material-icons">edit</i></a>'
                .\Form::open(["url" => route('products.destroy',$row->id),"class"=>"left"]).
                    '<input type="hidden" name="_method" value="DELETE">'.
                    '<a role="submit" onClick="return isValid(this)" class="waves-effect waves-light btn-small"><i class="lighten-3 material-icons">delete</i></a>'.
                    \Form::close();
            })->editColumn('type_product_id',function($row){
                return $row->typeProduct->name;
            })->editColumn('quantity',function($row){
                return $row->quantity.'<a href="'.route('products.add',$row->id).'" class="waves-effect waves-light btn-small"><i class="lighten-3 material-icons">add_box</i></a>';
            })->rawColumns(['quantity','action']);
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
            'price'=> ['title'=>'Precio'],
            'quantity'=> ['title'=>'Cantidad'],
            'type_product_id'=> ['title'=>'Tipo De Producto'],
            'action'=>['title'=>'Acciones','exportable' => false]
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
