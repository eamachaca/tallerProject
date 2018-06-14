<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeneralApiController extends Controller
{
    public function showProducts()
    {
        $products = Product::where('quantity', '>', 0)->where('enabled', true)->get();
        $result = [];
        foreach ($products as $product) {
            $aux = new \stdClass();
            $aux->id = $product->id;
            $aux->nombre = $product->name;
            $result[] = $aux;
        }
        return \response()->json(json_encode($result), Response::HTTP_OK);
    }

    public function index()
    {
        return view('api.index');
    }

    public function admin()
    {
        return view('api.admin');
    }

    public function user()
    {
        return view('api.user');
    }

    public function events()
    {
        return view('api.events');
    }
}
