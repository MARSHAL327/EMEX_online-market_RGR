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
        if( Auth::check() ) return redirect( route('/') );

        $userData = new UserDataController();
        $sameUserData = $userData->findSameUserData($req);

        if( $sameUserData == null ){
            $userDataID = $userData->CreateUserData($req);
        } else {
            $userDataID = $sameUserData->id;
        }

        if( $this->findSameUser($userDataID) == null ){
            $newUser = $this->CreateUser($req, $userDataID);
            Auth::login($newUser);
            return response()->json([
                "icon" => "success",
                "title" => "Успех",
                "text" => "Вы успешно зарегестрированы"
            ]);
        } else return response()->json([
            "icon" => "error",
            "title" => "Ошибка",
            "text" => "Такой пользователь уже зарегестрирован"
        ]);

    }

    public function CreateUser($req, $userID){
        $user = new User();
        $user->user_data = $userID;
        $user->password = Hash::make($req->input('password'));
        $user->role = "guest";
        $user->save();
        return $user;
    }

    public function findSameUser($userDataID){
        return User::firstWhere('user_data', $userDataID);
    }
}
