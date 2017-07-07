<?php

namespace CodeFlix\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use CodeFlix\Http\Controllers\Controller;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function accessToken(Request $request)
    {
        //se faltar email ou senha, nem continua a execução do
        //resto do código abaixo
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        if($token = \Auth::guard('api')->attempt($credentials))
            return $this->sendLoginResponse($request, $token);

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendLoginResponse(Request $request, $token)
    {
        return response()->json([
            'token' => $token
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json([
            'error' => \Lang::get('auth.failed'),
        ], 400);
    }

    public function logout(Request $request)
    {
        \Auth::guard('api')->logout();
        return response()->json([], 204);
    }

    public function refreshToken(Request $request)
    {
        $token = \Auth::guard('api')->refresh();
        return $this->sendLoginResponse($request, $token);
    }
}
