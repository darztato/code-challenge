<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UuidTrait;

    public const EMAIL_COLUMN = 'email';

    public const NAME_COLUMN = 'name';

    public const PASSWORD_COLUMN = 'password';

    public const SEARCHABLE_INDEX_EMAIL = 'email_searchable_idx';

    public const SEARCHABLE_INDEX_NAME = 'name_searchable_idx';

    public const TABLE = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    public function getEmail(): string
    {
        return $this->getAttribute(self::EMAIL_COLUMN);
    }

    public function getPassword(): string
    {
        return $this->getAttribute(self::PASSWORD_COLUMN);
    }

    public function setEmail(string $email): self
    {
        $this->setAttribute(self::EMAIL_COLUMN, $email);

        return $this;
    }

    public function setName(string $name): self
    {
        $this->setAttribute(self::NAME_COLUMN, $name);

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->setAttribute(self::PASSWORD_COLUMN, $password);

        return $this;
    }
}
