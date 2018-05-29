<?php

namespace App\DataTables;

use App\Order;
use App\User;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
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
                return '<a href="'.route('orders.edit',$row->id).'" class="left waves-effect waves-light btn-small"><i class="lighten-3 material-icons">edit</i></a>'
                    .\Form::open(["url" => route('orders.destroy',$row->id),"class"=>"left"]).
                    '<input type="hidden" name="_method" value="DELETE">'.
                    '<a role="submit" onClick="return isValid(this)" class="waves-effect waves-light btn-small"><i class="lighten-3 material-icons">delete</i></a>'.
                    \Form::close();
            })
            ->editColumn('name',function ($row){
                return  'Pedido#'.$row->id;
            })
            ->editColumn('ubication',function($row) {
                return '<a class="left waves-effect waves-light btn-small" target="_blank" href="http://maps.google.com/maps?q='.$row->lat.','.$row->lng.'&amp;t=m">
                                    <i class="lighten-3 material-icons">streetview</i></a>';
            })->editColumn('products',function($row) {
                return $row->products->count().'<a class="waves-effect waves-light btn-small" href="'.route('orders.show',$row->id).'"><i class="lighten-3 material-icons">view_headline</i></a>';
            })->rawColumns(['action','ubication','products']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return Order::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->parameters(array_merge($this->getBuilderParameters(),[
                "responsive" => true]))
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
            'name'=>['title'=>'Número de Pedido'],
            'client_name'=> ['title'=>'Nombre del Cliente'],
            'products'=> ['title'=>'Cantidad de Productos'],
            'total_price'=> ['title'=>'Precio Total'],
            'ubication'=>['title'=>'Ubicacion','exportable' => false],
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
        return 'Order_' . date('YmdHis');
    }
}
