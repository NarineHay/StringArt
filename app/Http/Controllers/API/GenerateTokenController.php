<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LoginToken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenerateTokenController extends BaseController
{
    public function __invoke(LoginToken $token)
    {
        do {
            $token = Str::random(8);
        } while (LoginToken::where('token', $token)->exists());

        $generated_token = LoginToken::create(['token' => $token]);

        if($generated_token){
            return response()->json(['success' => true, 'token' =>  $token]);

        }

        return response()->json(['success' => false], 400);

    }
}
