<?php

namespace App\Http\Controllers;

use App\Product;
use App\DataTables\ProductDataTable;
use App\TypeProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('products.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeProducts=TypeProduct::all()->pluck('name','id');
        $typeProducts->prepend([null=>'Por Favor Selecciona un Tipo de Producto']);
        return view('products.create',['typeProducts'=>$typeProducts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product();
        $product->type_product_id=$request->get('type_product_id');
        $product->name=$request->get('name');
        $product->price=$request->get('price');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $typeProducts=TypeProduct::all()->pluck('name','id');
        return view('products.edit',
            ['product'=>$product,
             'typeProducts'=>$typeProducts
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->type_product_id=$request->get('type_product_id');
        $product->name=$request->get('name');
        $product->price=$request->get('price');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    /**
     * Add the specified quantity in storage.
     *
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function add(Product $product)
    {
        return view('products.add-stock',
            ['product'=>$product
            ]);
    }
    /**
     * Add the specified quantity in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
    */
    public function stock(Request $request,Product $product)
    {
        $product->quantity=$request->get('quantity');
        $product->save();
        return redirect()->route('products.index');
    }
}
