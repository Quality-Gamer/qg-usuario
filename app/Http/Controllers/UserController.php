<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\University;
use App\APIService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email','password']);
        return User::login($credentials);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'university' => 'required',
            'char' => 'required',
        ]);

        if ($validator->fails()) {
            $err = $validator->errors();
            // $array = array();

            // foreach ($err as $e) {
            //    $array[] = User::message()[$e]; 
            // }

            return APIService::sendJson(["status" => "NOK", "response" => [], "message" => $err]);
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->university_id = $request->input('university');
        $user->char_id = $request->input('char');

        if(!$user->save()) {
            return APIService::sendJson(["status" => "NOK", "response" => [], "message" => "Falha na operação"]);
        }

        return APIService::sendJson(["status" => "OK", "response" => $user, "message" => "sucesso"]);
    }

    public function user(Request $request){
        $id = $request->input("user_id");
        return User::find($id);
    }

    public function loadUsers(Request $request){
        return User::all();

    }

    public function getUniversities(Request $request) {
        $u = DB::table('university')
        ->whereRaw('activated = ?', [1])
        ->orderByRaw('name ASC')
        ->get();
        return ["status" => "OK", "response" => $u, "message" => "success"];
    }
}
