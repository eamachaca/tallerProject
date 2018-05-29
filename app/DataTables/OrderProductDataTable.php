<?php

namespace App\DataTables;

use App\Order;
use App\OrderProduct;
use App\User;
use Yajra\DataTables\Services\DataTable;

class OrderProductDataTable extends DataTable
{
    /**
     * DataTables Order.
     *
     * @var string
     */
    protected $id= null;
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable( $query)
    {
        return datatables($query)
            ->editColumn('id',function ($row)  use($query){
                return $query->get()->search(function ($item, $key) use ($row){
                    return $row->id==$item->id;
                })+1;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param integer
     * @return $this
     */
    public function addOrderId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return Order::find($this->id)->products()->select(['order_product.*','products.name'])->orderBy('products.id','asc');
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
        $orders=Order::find($order->id)->products()->select(['order_product.*','products.*'])->orderBy('products.id','asc');
        $orderTemp=Order::find($order->id)->products()->select(['order_product.*','products.*'])->get()->random();
        dd($orders->get()->search(function ($item, $key) use ($orderTemp){
            return $orderTemp->id==$item->id;
        }));
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id'=> ['title'=>'Número'],
            'name'=>['title'=>'Nombre del Producto'],
            'quantity'=>['title'=>'Cantidad'],
            'partial_price'=>['title'=>'Precio Parcial'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'OrderProduct_' . date('YmdHis');
    }
}
