<?php declare(strict_types=1);

namespace App\Util;

use DateTime;
use DateTimeZone;

class DbDateUtil {
    /**
     * Converts a database DATETIME to PHP DateTime
     * The timezone is correctly set to UTC.
     * @param $dbDateString
     * @return DateTime
     */
    public static function fromDB( string $dbDateString ) : DateTime
    {
        return new DateTime( $dbDateString, new DateTimeZone('Asia/Tokyo') );
    }

    public static function toDB( DateTime $dateTime ) : string {
        return $dateTime->setTimezone( new DateTimeZone('UTC') )->format('Y-m-d H:i:s');
    }

    public static function getNow() : DateTime
    {
        return new DateTime( 'now', new DateTimeZone('Asia/Tokyo') );
    }

    /**
     * This function returns datetime
     * with the storable form into DB
     *
     * @return string
     */
    public static function getNowDB() : string
    {
        return self::toDB( self::getNow() );
    }


}