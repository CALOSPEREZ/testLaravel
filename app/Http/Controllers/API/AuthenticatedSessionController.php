<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\LoginResource;
use Illuminate\Http\Request;
use App\Utils\Enums\EnumResponse;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {     $request->authenticate();  
        try {
        $token =   $request->token();
        $data = $request->user();
        $data->token = $token;
        return bodyResponseRequest(EnumResponse::SUCCESS, new LoginResource($data));
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function logout(Request $request)
    {
        try {
            $request->user()->token()->revoke();
            return bodyResponseRequest(EnumResponse::SUCCESS,['message' =>'Sesion Cerrada']);
        } catch (\Exception $e) {
            return bodyResponseRequest(EnumResponse::ERROR, $e, [], self::class . '.login');
        }
        
    }
}
