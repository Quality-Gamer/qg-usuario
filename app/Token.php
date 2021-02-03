<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Token extends Model
{
    protected $table = 'token';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function isValid() {
        $valid = DB::select("SELECT NOW() <= '{$this->expires}' AS valid")->first();
        return $valid['valid'];      
    }

    public function setExpires() {
        $expires = DB::select("SELECT DATE_ADD(NOW(),INTERVAL 2 HOUR) AS expires")->first();
        $this->expires = $expires['expires'];  
    }

}
