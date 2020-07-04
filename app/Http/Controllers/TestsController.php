<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\APIService;
use App\Test;
use App\UserTest;

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

    public function getQuestions(Request $request){
        $credentials = $request->only(['email','password']);
        
        if (!Auth::attempt($credentials)) {
            return APIService::sendJson(["status" => "NOK", "response" => NULL, "message" => "Email e/ou senha inválidos"]);
        }

        $match_id = $request->input('match_id');

        $userTest = UserTest::where('match_id', $match_id)->first();
        
        if(!isset($userTest)){
            return APIService::sendJson(["status" => "NOK", "response" => NULL, "message" => "Esse teste não foi iniciado"]);
        }

        $test = $userTest->test;
        $questions = $test->questions;


        return APIService::sendJson(["status" => "OK", "response" => ["questions" => $questions],"message" => "success"]);

    }
}
