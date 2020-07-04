<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserTest extends Model
{
    protected $table = 'user_test';

    public function test()
    {
        return $this->hasOne('App\Test');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }

}