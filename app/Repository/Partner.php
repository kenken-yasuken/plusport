<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class Partner{
    public static function getTargets($loginUserID) {
        $entries = DB::table(self::getTableName())->where('id' ,'<>' , $loginUserID)->get();
        return $entries;
    }

    public static function getTableName(){
        return self::USERS;
    }

    const USERS = 'users';
}
