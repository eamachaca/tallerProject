<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Distributor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    /**
     * @param Request $request
     * @param string $class
     * @return \Illuminate\Http\JsonResponse
     */
    public function login($request,$class){
        //try {
            $user = $class::where('username', $request->get('username'))->first();
            if (!$user || !Hash::check($request->get('password'), $user->password)) {
                throw new \Exception();
            }

            $success['token'] = $user->createToken('FamiUni',[ str_after(strtolower($class).'s','\\') ])->accessToken;
            return response()->json(['success' => $success,'tokens'=>$user->tokens], Response::HTTP_OK);
        //}catch (\Exception $e){}
        return response()->json(['error'=>'Datos Incorrectos'], Response::HTTP_CONFLICT);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginClient(Request $request){
        return $this->login($request,Client::class);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginDistributor(Request $request){
        return $this->login($request,Distributor::class);
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function registerClient(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'username'=>'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], Response::HTTP_UNAUTHORIZED);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Client::create($input);
        $success['token'] =  $user->createToken('FamiUni')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], Response::HTTP_OK);
    }
}
