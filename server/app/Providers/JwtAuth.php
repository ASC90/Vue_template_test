<?php

namespace App\Providers;

use \Firebase\JWT\JWT;
use Carbon\Carbon;


class JWTAuth
{
    public $key;
    public function __contructor()
    {
        $this->key = env('APP_KEY');
    }
    public function createToken($user)
    {
        $date = Carbon::now();
        if (is_object($user)) {
            $token = [
                $id => $user['id'],
                $email => $user['email'],
                $username => $user['username'],
                $expired => $date->addHour(2)
            ];

            $jwt = JWT::encode($token, $this->key, 'RS256');

            return $jwt;
        }
    }

    public function checkToken($jwt)
    {
        $auth = false;

        try {
            $decoded = JWT::decode($jwt, $this->key, array('RS256'));

            if (is_object($decoded) && isset($decoded->id)) {
                if ($decoded->expired >= Carbon::now()) {
                    $auth = false;
                } else {
                    $auth = true;
                }
            }
        } catch (Exception $e) {
            $auth = false;
        }

    }
}
?>