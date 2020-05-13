<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Repository\Structs\PartnerInfo;
use App\Util\DbDateUtil;

class Partner{
    public static function getTargets($loginUserID)
    {
        $entries = DB::table(self::getTableName())->where('id' ,'<>' , $loginUserID)->get();
        return $entries;
    }

    public static function getByID($partnerID): ?PartnerInfo
    {
        $entry = DB::table(self::getTableName())->where('id' , $partnerID)->get();
        return self::fillInfo($entry[0]);
    }

    public static function fillInfo($dbData): PartnerInfo
    {
        $info = new PartnerInfo;
        $info->id = strval($dbData->id);
        // $info->firstName = strval($dbData->firstName);
        // $info->familyName = strval($dbData->familyName);
        // $info->firstNameKana = strval($dbData->firstNameKana);
        // $info->familyNameKana = strval($dbData->familyNameKana);
        $info->nickName = strval($dbData->nickname);
        // $info->gender = strval($dbData->gender);
        // $info->age = strval($dbData->age);
        // $info->birthday = strval($dbData->birthday);
        // $info->email = strval($dbData->email);
        // $info->createdAt = DbDateUtil::fromDB($dbData->createdAt);
        // $info->udpatedAt = DbDateUtil::fromDB($dbData->updatedAt);
        return $info;
    }

    public static function getTableName(): string
    {
        return self::USERS;
    }

    const USERS = 'users';
}
