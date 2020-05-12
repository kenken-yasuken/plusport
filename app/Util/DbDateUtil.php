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
}