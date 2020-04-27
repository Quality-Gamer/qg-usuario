<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email','password']);
        return User::login($credentials);
    }
}
