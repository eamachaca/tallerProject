<?php

namespace App\Http\Controllers;

use App\DataTables\TypeProductDataTable;
use App\TypeProduct;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TypeProductDataTable $dataTable)
    {
        return $dataTable->render('type-products.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type-products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeProduct=new TypeProduct();
        $typeProduct->name=$request->get('name');
        $typeProduct->description=$request->get('description');
        $typeProduct->save();
        return redirect()->route('type-products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeProduct $typeProduct)
    {
        
        return view('type-products.edit',['typeProduct'=>$typeProduct]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeProduct $typeProduct)
    {
        $typeProduct->name=$request->get('name');
        $typeProduct->description=$request->get('description');
        $typeProduct->save();
        return redirect()->route('type-products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeProduct  $typeProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeProduct $typeProduct)
    {
        $typeProduct->delete();
        return redirect()->route('type-products.index');
    }
}
