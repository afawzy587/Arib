<?php

namespace App\Traits;
use Illuminate\Http\JsonResponse;

class GeneralResponse
{
  public static function responseMessage($title, $data = null,$code = 200): JsonResponse
  {

    return response()->json([
            'status' => $title,
            'code'   => $code,
            'data'   => is_string($data) ? ['message'=>$data] : $data,
          ], $code);
  }
}
