<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\University;
use App\APIService;

class UserController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email','password']);
        return User::login($credentials);
    }

    public function user(Request $request){
        $id = $request->input("user_id");
        return User::find($id);
    }

    public function loadUsers(Request $request){
        return User::all();

    }

    public function getUniversities(Request $request) {
        return ["status" => "OK", "response" => University::all(), "message" => "success"];
    }
}
