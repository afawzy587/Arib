<?php

namespace App\Http\Middleware;

use App\Traits\GeneralResponse;
use Closure;
use Illuminate\Http\Request;
class CheckAccountVerified
{
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->email_verified){
          return $next($request);
        }
        if($request->user()->delete_at){
          return GeneralResponse::responseMessage('error',__('main.AccountDeleted'),400);
        }
         return GeneralResponse::responseMessage('error',__('main.AccountNotVerified'),400);
    }
}
