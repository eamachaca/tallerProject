<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;

class UserController extends Controller
{

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $value=\request()->bearerToken();
        $id=(new Parser())->parse($value)->getHeader('jti');

        $user = Auth::guard('clients')->user();
        $user2 = Auth::guard('dealers')->user();
        return response()->json(['user' => $user->tokens,'dealer'=>$user2->tokens], 200);
    }
}
