<?php
namespace App\Traits;

use App\Mail\SendFormMail;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Mail;

trait FormTrait {

    public function sendForm($data){

        $email = $data['email'];
        $image = FileUploadService::uploadBase64($data['image']);
        $generated_image = FileUploadService::uploadBase64($data['generated_image']);
        // dd($email);

        try {
            Mail::send(new SendFormMail($email, $image, $generated_image));

            return true;
        } catch (\Throwable $th) {
            // throw $th;
            return false;
        }

    }


}
