<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Challenge extends Model
{
    public static function loadAllChallangesByUser($uid) {
        return DB::table('challenge')
                ->join('user_challenge', 'challenge.id', '=', 'user_challenge.challange_id')
                ->whereRaw('user_challenge.user_id = ?', [$uid])
                ->get();

    }
}
