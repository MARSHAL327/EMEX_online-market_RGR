<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Models\Users;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $req){
        if( $this->authenticate($req) ){
            return response()->json([
                "icon" => "success",
                "title" => "Успех",
                "text" => "Вы успешно авторизованы"
            ]);
        } else {
            return response()->json([
                "icon" => "error",
                "title" => "Ошибка",
                "text" => "Неверный логин или пароль"
            ]);
        }
    }

    public function authenticate($req)
    {
        $userData = Users::firstWhere('login', $req->input('login'));
        if($userData == null) return false;

        $credentials = [
            "id" => $userData->id,
            "password" => $req->input('password')
        ];

        return Auth::attempt($credentials);
    }
}
