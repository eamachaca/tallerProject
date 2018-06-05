<?php

namespace App\Http\Controllers\API;

use App\Product;
use App\TypeProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ClientApiController extends Controller
{
    public function showProducts(){
        $products=Product::where('quantity','>',0)->where('enabled',true)->get();
        $result=[];
        foreach ($products as $product ){
            $aux = new \stdClass();
            $aux->idProducto=$product->id;
            $aux->nombre=$product->name;
            $aux->precio=$product->price;
            $aux->tipoProducto=TypeProduct::find($product->type_product_id)->name;
            $aux->cantidad=$product->quantity;
            $result[]=$aux;
        }
        return response()->json(['products'=>json_encode($result)],Response::HTTP_OK);
    }
}
