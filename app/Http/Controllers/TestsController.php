<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\APIService;

class TestsController extends Controller
{
    public function loadAllowTests(Request $request){
        $credentials = $request->only(['email','password']);
        
        if (!Auth::attempt($credentials)) {
            return APIService::sendJson(["status" => "NOK", "response" => NULL, "message" => "Email e/ou senha inválidos"]);
        }

        $user = Auth::user();
        return $user->loadAllowTestsByUser();

    }

    public function loadDoneTests(Request $request){
        $credentials = $request->only(['email','password']);
        
        if (!Auth::attempt($credentials)) {
            return APIService::sendJson(["status" => "NOK", "response" => NULL, "message" => "Email e/ou senha inválidos"]);
        }

        $user = Auth::user();
        return $user->loadDoneTestsByUser();

    }
}
