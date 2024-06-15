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
            $check_token->update(['quantity_of_uses' => $check_token->quantity_of_uses + 1]);
            if($check_token->quantity_of_uses < 4){

                return response()->json(['success' => true]);

            }
            else{
                return response()->json(['completed' => true], 400);

            }
        }

        return response()->json(['undefined_token' => false], 400);
    }
}
