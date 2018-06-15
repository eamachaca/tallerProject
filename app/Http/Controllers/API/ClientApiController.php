<?php

namespace App\Http\Controllers\API;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
class ClientApiController extends Controller
{
    public function index(){
        return \response()->json(Client::all(),Response::HTTP_ACCEPTED);
    }
}
