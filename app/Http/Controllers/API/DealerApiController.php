<?php

namespace App\Http\Controllers\API;

use App\Distributor;
use App\FillDistributor;
use App\Http\Controllers\Controller;
use App\Order;
use App\Ubication;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DealerApiController extends Controller
{
    public function index()
    {
        return \response()->json(Distributor::all(), Response::HTTP_ACCEPTED);
    }
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

    public function getRoute(Request $request)
    {
        if (!$request->has(['lat','lng','carga'])){
            $data = new \stdClass();
            $data->errors='No se enviaron todos los parámetros';
            return \response()->json($data,Response::HTTP_PRECONDITION_FAILED);
        }
        $distributor =  $request->user();
        $orders = Order::where('zone_id', $distributor->zone->id)->where('state',0)->get();
        $results= collect();
        $products=$request->get('carga');
        foreach ($products as $product){
            FillDistributor::create([
                'quantity'=> $product[cantidad],
                'product_id'=> $product[product_id],
                'distributor_id'=>$distributor->id
            ]);
        }
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
                $pedido=[];
                foreach ($order->products as $product){
                    $pedido[]=[
                        'nombre'=>$product->name,
                        'cantidad'=>$product->pivot->quantity,
                        'total'=>$product->pivot->partial_price
                    ];
                }
                $result->put($str, [$key=>[
                    'id'=>$order->id,
                    'nombre'=>$order->client_name,
                    'telefono'=>$order->client_phone,
                    'direccion'=>$order->address,
                    'lat'=>$order->lat,
                    'lng'=>$order->lng,
                    'pedido' => $pedido,
                    'total' =>$order->total_price
                ]]);
            }
            $result=$result->sortKeys();
            $first=$result->first();
            $results[]=array_shift($first);
            $orders->forget(key($result->first()));
        }
        return \response()->json($results,Response::HTTP_ACCEPTED);
    }
    public function updateState(Request $request)
    {
        if (!$request->has(['id_pedido', 'estado', 'mensaje'])) {
            $data = new \stdClass();
            $data->errors = 'No se enviaron todos los parámetros';
            return \response()->json($data, Response::HTTP_PRECONDITION_FAILED);
        }
        $distributor=$request->user();
        $order=Order::find($request->get('id_pedido'));
        switch ($request->get('estado')){
            case 'pendiente':
                $order->state=1;
                break;
            case 'entregado':
                $order->state=2;
                break;
            default:
                $order->state=3;
                break;
        }
        $order->distributor_id=$distributor->id;
        $order->save();
        $results=[];
        return \response()->json($results,Response::HTTP_ACCEPTED);
    }
    public function tracking(Request $request)
    {
        if (!$request->has(['lat', 'long', 'datetime'])) {
            $data = new \stdClass();
            $data->errors = 'No se enviaron todos los parámetros';
            return \response()->json($data, Response::HTTP_PRECONDITION_FAILED);
        }
        $distributor=$request->user();
        $ubication=Ubication::create([
            'lat'=>$request->get('lat'),
            'lng'=>$request->get('lng'),
            'distributor_id'=>$distributor->id,
            'created_at'=>$request->get('datetime')
        ]);
        return \response()->json(new \stdClass(),Response::HTTP_ACCEPTED);
    }
}
