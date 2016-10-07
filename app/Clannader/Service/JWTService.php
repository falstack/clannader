<?php

namespace App\Clannader\Service;

use Tymon\JWTAuth\Facades\JWTAuth;

class JWTService
{
    public function refreshToken()
    {
        $oldToken = JWTAuth::getToken();

        $token = JWTAuth::refresh($oldToken);

        return response()->json(compact('token'));
    }

    public function createToken($user) {
        $token = JWTAuth::fromUser($user);
        return $token;
    }

    public function authenticate($credentials)
    {
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    static public function getAuthUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return JWTAuth::parseToken()->authenticate();
    }

    static public function getUserIdByJWT()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return 0;
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return 0;

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return 0;

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return 0;

        }

        return JWTAuth::parseToken()->authenticate()->id;
    }
}