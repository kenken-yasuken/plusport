<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Repository\Structs\ReactionInfo;
use App\Util\DbDateUtil;

class Reaction{
    public static function create(
        string $fromUserID,
        string $toUserID,
        string $status
        ): bool {
            $now = DbDateUtil::getNowDB();
            DB::table(self::getTableName())->insert([
                'from_user_id' => $fromUserID,
                'to_user_id' => $toUserID,
                'status' => $status,
                'created_at' => $now,
                'updated_at' => $now
            ]);
            return true;
        }

    public static function getByID($partnerID): ?ReactionInfo
    {
        $entry = DB::table(self::getTableName())->where('id' , $partnerID)->get();
        return self::fillInfo($entry[0]);
    }

    public static function fillInfo($dbData): ReactionInfo
    {
        $info = new ReactionInfo;
        $info->id = strval($dbData->id);
        $info->fromUserID = strval($dbData->toUserID);
        $info->toUserID = strval($dbData->fromUserID);
        $info->createdAt = DbDateUtil::fromDB($dbData->createdAt);
        $info->udpatedAt = DbDateUtil::fromDB($dbData->updatedAt);
        return $info;
    }

    public static function getTableName(): string
    {
        return self::REACTIONS;
    }

    const REACTIONS = 'reactions';
}
