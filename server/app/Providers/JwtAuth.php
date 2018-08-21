<?php

namespace App\Providers;

use \Firebase\JWT\JWT;
use Carbon\Carbon;


class JWTAuth
{
    public function __contructor()
    {
    }
    public static function createToken($user)
    {
        $key = env('APP_KEY');
        $date = Carbon::now();
        if (is_object($user)) {
            $token = [
                'id' => $user->id,
                'email' => $user->email,
                'username' => $user->username,
                'expire' => $date->addHour(2)
            ];

            $jwt = JWT::encode($token, $key);

            return $jwt;
        }
    }

    public function checkToken($jwt)
    {
        $auth = false;
        $message;
        try {
            $decoded = JWT::decode($jwt, $this->key, array('RS256'));

            if (is_object($decoded) && isset($decoded->id)) {
                if ($decoded->expired >= Carbon::now()) {
                    $auth = false;
                    $message = "autorización caducada";
                } else {
                    $auth = true;
                    $message = "autorización aceptada";
                }
            }
        } catch (Exception $e) {
            $auth = false;
            $message = "no autorizado";
        }

        return ["auth" => $auth, "message" => $message];

    }
}
?>