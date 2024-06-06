<?php

namespace App\Services;

use Dotenv\Util\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileUploadService
{

    public static function uploadBase64(string $base64String)
    {


        // Check if the base64 string is valid
        if (preg_match('/^data:image\/(\w+);base64,/', $base64String, $type)) {
            $base64String = substr($base64String, strpos($base64String, ',') + 1);
            $type = strtolower($type[1]); // jpg, png

            if (!in_array($type, ['jpg', 'jpeg', 'png'])) {
                return response()->json(['error' => 'Invalid image type'], 400);
            }

            $base64String = str_replace(' ', '+', $base64String);
            $imageData = base64_decode($base64String);

            if ($imageData === false) {
                return response()->json(['error' => 'Base64 decode failed'], 400);
            }
        } else {
            return response()->json(['error' => 'Invalid base64 string'], 400);
        }

        $fileName = md5(microtime()) . '.' . $type;
        $filePath = 'srtingart-images/' . $fileName;
        $file = Storage::disk('public')->put($filePath, $imageData);

        if($file){
            return  'public/' . $filePath;
        }

        return false;


    }



}
