<?php

declare(strict_types=1);

namespace App\Domain\Customer\Models;

use App\Models\AbstractProjection;
use Illuminate\Database\Eloquent\Model;

final class Customer extends AbstractProjection
{
    public const CITY_COLUMN = 'city';

    public const COUNTRY_COLUMN = 'country';

    public const DELETED_AT = 'deleted_at';

    public const EMAIL_COLUMN = 'email';

    public const FIRST_NAME_COLUMN = 'first_name';

    public const UUID_COLUMN = 'uuid';

    public const LAST_NAME_COLUMN = 'last_name';

    public const GENDER_COLUMN = 'gender';

    public const PASSWORD_COLUMN = 'password';

    public const PHONE_COLUMN = 'phone';

    public const SEARCHABLE_INDEX_EMAIL = 'email_searchable_idx';

    public const TABLE = 'customers';

    public const USERNAME_COLUMN = 'username';

    /**
     * @var array<string, string>
     */
    protected $casts = [
        Model::CREATED_AT => 'immutable_datetime',
        Model::UPDATED_AT => 'immutable_datetime',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        Model::CREATED_AT,
        Model::UPDATED_AT,
        self::DELETED_AT
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        self::CITY_COLUMN,
        self::COUNTRY_COLUMN,
        self::FIRST_NAME_COLUMN,
        self::UUID_COLUMN,
        self::LAST_NAME_COLUMN,
        self::GENDER_COLUMN,
        self::PASSWORD_COLUMN,
        self::PHONE_COLUMN,
        self::USERNAME_COLUMN
    ];

    /**
     * @inheritdoc
     */
    protected $table = self::TABLE;

    public function getCity(): string
    {
        return $this->getAttribute('city');
    }

    public function getCountry(): string
    {
        return $this->getAttribute('country');
    }

    public function getEmail(): string
    {
        return $this->getAttribute('email');
    }

    public function getFirstName(): string
    {
        return $this->getAttribute('first_name');
    }

    public function getGender(): string
    {
        return $this->getAttribute('gender');
    }

    public function getUuid(): string
    {
        return $this->getAttribute('uuid');
    }

    public function getLastName(): string
    {
        return $this->getAttribute('last_name');
    }

    public function getPhone(): string
    {
        return $this->getAttribute('phone');
    }

    public function getUsername(): string
    {
        return $this->getAttribute('username');
    }

    public function setCity(string $city): self
    {
        $this->setAttribute('city', $city);

        return $this;
    }

    public function setCountry(string $country): self
    {
        $this->setAttribute('country', $country);

        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->setAttribute('email', $email);

        return $this;
    }

    public function setFirstName(string $firstName): self
    {
        $this->setAttribute('first_name', $firstName);

        return $this;
    }

    public function setGender(string $gender): self
    {
        $this->setAttribute('gender', $gender);

        return $this;
    }

    public function setUuid(string $uuid): self
    {
        $this->setAttribute('uuid', $uuid);

        return $this;
    }

    public function setLastName(string $lastName): self
    {
        $this->setAttribute('last_name', $lastName);

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->setAttribute('password', $password);

        return $this;
    }

    public function setPhone(string $phone): self
    {
        $this->setAttribute('phone', $phone);

        return $this;
    }

    public function setUserName(string $userName): self
    {
        $this->setAttribute('username', $userName);

        return $this;
    }
}
