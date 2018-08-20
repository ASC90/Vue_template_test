<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;

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
        var_dump($this);
        $this->validate($request, [
            'username' => 'required| unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ], $this->mensaje);

        var_dump("euuuu");
        $test = ["hola" => "euuu"];
        return response()->json();
    }
}
