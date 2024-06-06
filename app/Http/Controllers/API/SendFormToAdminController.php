<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SendFormRequest;
use App\Traits\FormTrait;
use Illuminate\Http\Request;

class SendFormToAdminController extends Controller
{
    use FormTrait;

    public function __invoke(SendFormRequest $request)
    {
        $send_form = $this->sendForm($request->all());

        if($send_form){
            return response()->json(['success' => true]);

        }
        return response()->json(['success' => false], 400);

    }
}
