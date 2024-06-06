<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckTokenRequest;
use App\Models\LoginToken;
use Illuminate\Http\Request;

class CheckTokenController extends Controller
{
    public function __invoke(CheckTokenRequest $request)
    {

        $token = $request->token;
        $check_token = LoginToken::where('token', $token)->first();

        if($check_token){
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
