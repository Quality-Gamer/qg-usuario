<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', ['middleware' => 'cors', 'uses' => 'UserController@login']);
Route::post('/user', ['middleware' => 'cors', 'uses' => 'UserController@user']);
Route::post('/tests/load', ['middleware' => 'cors', 'uses' => 'TestsController@loadAllowTests']);
Route::post('/tests/done', ['middleware' => 'cors', 'uses' => 'TestsController@loadDoneTests']);
Route::post('/tests/questions', ['middleware' => 'cors', 'uses' => 'TestsController@getQuestions']);
Route::post('/tests/save', ['middleware' => 'cors', 'uses' => 'TestsController@saveTests']);
Route::get('/load/users', ['middleware' => 'cors', 'uses' => 'UserController@loadUsers']);
Route::post('/challange/create', ['middleware' => 'cors', 'uses' => 'ChallengeController@create']);
Route::get('/challange/load', ['middleware' => 'cors', 'uses' => 'ChallengeController@load']);
