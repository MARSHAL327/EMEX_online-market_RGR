<?php

namespace App\Http\Controllers\Auth;

use app\core\View;
use App\Http\Controllers\Controller;
use App\Http\Models\UserData;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $userData = UserData::firstWhere('phone', $req->input('phone'));

        $credentials = [
            "user_data" => $userData->id,
            "password" => $req->input('password')
        ];

        return Auth::attempt($credentials);
    }
}
