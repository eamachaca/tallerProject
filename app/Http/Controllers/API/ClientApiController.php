<?php

namespace App\Http\Controllers\API;

use App\Distributor;
use App\Order;
use App\Product;
use App\TypeProduct;
use App\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
class ClientApiController extends Controller
{
    private function distance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

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

    public function getRoute(Request $request)
    {
        $products = json_decode($request->get('productos'));
        $distributor = Distributor::find($request->get('distribuidor'));
        $orders = Order::where('zone_id', $distributor->zone->id)->get();
        $results= collect();
        $lat=$request->get('lat');
        $lng=$request->get('lng');
        $count=$orders->count();
        for ($i=0;$i<$count;$i++) {
            $result=collect();
            foreach ($orders as $key=>$order) {
                $distance=$this->distance($order->lat,$order->lng,$lat,$lng,'K');
                $str=strval($distance);
                if (intval($distance)<10){
                    $str='0'.$str;
                }
                $result->put($str, [$key=>$order]);
            }
            $result=$result->sortKeys();
            $first=$result->first();
            $results[]=array_shift($first);
            $orders->forget(key($result->first()));
        }
        return \response()->json($results,Response::HTTP_ACCEPTED);
    }
}
