<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Repository\Structs\MatchingInfo;
use App\Util\DbDateUtil;

class Matching{
    /**
     * @param integer $trainerID
     * @param integer $traineeID
     * @param integer $sportID
     * @param integer $categoryID
     * @return boolean
     */
    public static function insert(int $trainerID, int $traineeID, int $sportID, int $categoryID): bool
    {
        $now = DbDateUtil::getNowDB();
        $createdAt = $now;
        $updatedAt = $now;
        DB::table(self::getTableName())->insert(
            [
                'trainer_id' => $trainerID,
                'trainee_id' => $traineeID,
                'sport_id' => $sportID,
                'category_id' => $categoryID,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ]
        );
        return true;
    }

    public static function getTargets($loginUserID)
    {
        $entries = DB::table(self::getTableName())->where('id' ,'<>' , $loginUserID)->get();
        return $entries;
    }

    // public static function getByID($partnerID): ?PartnerInfo
    // {
    //     $entry = DB::table(self::getTableName())->where('id' , $partnerID)->get();
    //     return self::fillInfo($entry[0]);
    // }

    public static function fillInfo($dbData): MatchingInfo
    {
        $info = new MatchingInfo;
        $info->id = strval($dbData->id);
        $info->trainerID = strval($dbData->trainer_id);
        $info->traineeID = strval($dbData->trainee_id);
        $info->sportID = strval($dbData->sport_id);
        $info->categoryID = strval($dbData->category_id);
        $info->createdAt = DbDateUtil::fromDB($dbData->createdAt);
        $info->udpatedAt = DbDateUtil::fromDB($dbData->updatedAt);
        return $info;
    }

    public static function getTableName(): string
    {
        return self::MATCHINGS;
    }

    const MATCHINGS = 'matchings';
}
