<?php declare(strict_types=1);

namespace App\Repository\Structs;

class MatchingInfo {
    /** @var string $id */
    public $id = '';

    /** @var string $trainer_id */
    public $trainerID = '';

    /** @var string $trainee_id */
    public $traineeID = '';

    /** @var string $sport_id */
    public $sportID = '';

    /** @var string $category_id */
    public $categoryID = '';

    /** @var DateTime $createdAt */
    public $createdAt;

    /** @var DateTime $updatedAt */
    public $updatedAt;
}