<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\API;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class JwtAuth
{
    public function handle($request, Closure $next) {
        try {
            $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();

            if($user!=null){

            }else{
                $result = API::createResponse(true, 10004, null, 'Token error');
                return response()->json($result, 401);
            }

        } catch (TokenExpiredException $e) {
            $result = API::createResponse(true, 14004, null, 'Token Expired');
            return response()->json($result, 401);
        } catch (TokenInvalidException $e) {
            $result = API::createResponse(true, 14004, null, 'Invalid Token');
            return response()->json($result, 401);
        } catch (JWTException $e) {
            $result = API::createResponse(true, 14004, null, 'Jwt Exception');
            return response()->json($result, 401);
        }

        $response =  $next($request);
        return $response;
    }
}
