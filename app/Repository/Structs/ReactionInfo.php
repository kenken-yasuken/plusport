<?php declare(strict_types=1);

namespace App\Repository\Structs;

class ReactionInfo {
    /** @var string $id */
    public $id = '';

    /** @var string $from_user_id */
    public $fromUserID = '';

    /** @var string $to_user_id */
    public $toUserID = '';

    /** @var DateTime $createdAt */
    public $createdAt;

    /** @var DateTime $updatedAt */
    public $updatedAt;
}