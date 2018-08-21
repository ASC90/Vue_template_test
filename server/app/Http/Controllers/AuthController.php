<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Hash;
use App\Providers\JWTAuth;

class AuthController extends Controller
{
    //

    public $mensaje;

    public function __construct()
    {
        $this->mensaje = [
            'username.required' => 'el nombre es requerido',
            'username.unique' => 'el nombre de usuario ya esta en uso',
            'email.required' => 'el email es requerido',
            'email.unique' => 'el email ya esta en uso',
            'email.email' => 'no es un email',
            'password.required' => 'la contraseña es requerida'
        ];
    }

    public function login(Request $request)
    {
        $params = $request->only(["email", "password", "hash"]);
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], $this->mensaje);

      // login

        $user = User::where('email', $params['email'])->first();
        if ($user) {
            if (Hash::check($params['password'], $user['password'])) {
                if (!empty($params['hash'])) {
                    $token = JWTAuth::createToken($user);
                    return response()->json(['token' => $token]);
                } else {
                    return response()->json($user);
                }
            } else {
                return response()->json(['message' => 'la contraseña es incorrecta'], 500);
            }
        }



    }

    public function register(Request $request)
    {

        $params = $request->only(["username", "email", "password"]);
        $this->validate($request, [
            'username' => 'required| unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ], $this->mensaje);

        User::create([
            'username' => $params["username"],
            'email' => $params["email"],
            'password' =>
                Hash::make($params["password"])
        ]);

        return response()->json(["message" => "el usuario ha sido registrado"], 200);

    }
}
