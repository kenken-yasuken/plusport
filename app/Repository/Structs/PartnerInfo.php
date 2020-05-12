<?php declare(strict_types=1);

namespace App\Repository\Structs;

class PartnerInfo {
    /** @var string $id */
    public $id = '';

    /** @var string $firstName */
    public $firstName = null;

    /** @var string $familyName */
    public $familyName = null;

    /** @var string|null $firstNameKana */
    public $firstNameKana = null;

    /** @var string|null $familyNameKana */
    public $familyNameKana = null;

    /** @var string $nickName */
    public $nickName = null;

    /** @var string $gender */
    public $gender = '';

    /** @var integer $age */
    public $age = '';

    /** @var integer $birthday */
    public $birthday = null;

    /** @var string $email */
    public $email = '';

    /** @var DateTime $emailVerifiedAt */
    public $emailVerifiedAt = null;

    /** @var string $password
     * this is encrypted automatically
     */
    public $password = '';

    /** @var string $ememberToken */
    public $rememberToken = '';

    /** @var DateTime $updatedAt */
    public $createdAt;

    /** @var DateTime $updatedAt */
    public $updatedAt;

    // public function getFullName() : string {
    //     $firstName = (is_null($this->firstName) || ($this->firstName == '')) ? null : $this->firstName;
    //     $lastName = (is_null($this->lastName) || ($this->lastName == '')) ? null : $this->lastName;

    //     if (!is_null($firstName) && !is_null($lastName)) {
    //         return $lastName.' '.$firstName;
    //     }
    //     if (!is_null($firstName)) {
    //         return $firstName;
    //     }
    //     if (!is_null($lastName)) {
    //         return $lastName;
    //     }

    //     return '';
    // }
}