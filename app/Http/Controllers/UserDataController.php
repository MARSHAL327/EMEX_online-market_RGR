<?php

namespace App\Http\Controllers;

use App\Http\Models\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function CreateUserData($req){
        $userData = new UserData();
        $fio = explode(' ', $req->input('fio'));

        $userData->first_name = $fio[0];
        $userData->last_name = $fio[1];
        $userData->patronymic = $fio[2];
        $userData->phone = $req->input('phone');

        $userData->save();
        return $userData->id;
    }

    public function findSameUserData($req){
        return UserData::firstWhere('phone', $req->input('phone'));
    }
}
