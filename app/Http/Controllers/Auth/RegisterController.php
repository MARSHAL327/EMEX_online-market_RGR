<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserDataController;
use App\Http\Models\UserData;
use App\User;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegistrationRequest $req){
        if( User::firstWhere('login', $req->input('login')) == null ){
            $this->CreateUser($req);

            return response()->json([
                "icon" => "success",
                "title" => "Успех",
                "text" => "Контент-менеджер зарегестрирован"
            ]);
        } else return response()->json([
            "icon" => "error",
            "title" => "Ошибка",
            "text" => "Такой пользователь уже зарегестрирован"
        ]);

    }

    public function CreateUser($req){
        $user = new User();
        $user->login = $req->login;
        $user->password = Hash::make($req->password);
        $user->role = $req->role;
        $user->save();

        return $user;
    }
}
