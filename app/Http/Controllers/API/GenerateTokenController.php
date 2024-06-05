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

        return response()->json(['success' => true, 'token' =>  $token]);

    }
}
