<?php declare(strict_types=1);

namespace App\Repository\Enum;

class ReactionEnum {
    const LIKE = 10;                 //'like' other users
    const DECLINE = -10;             //decline against 'like' from other users
    const HIDE = 20;                 //hide some users when a user don't want to see others
    const BLOCK = 30;                //a user can block other users

    static function enumToString(int $status) :string{
        switch ($$status){
            case self::LIKE:
                return 'like';
            case self::DECLINE:
                return 'decline';
            case self::HIDE:
                return 'hide';
            case self::BLOCK:
                return 'block';
            default:
                throw new \InvalidArgumentException('[#p9eenze]');
        }
    }
}