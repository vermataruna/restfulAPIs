<?php

namespace App\Models;

use App\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'verified',
        'verification_token',
        'admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isVerified(): bool
    {
        return $this->verified === UserTypeEnum::VERIFIED;
    }

    public function isAdmin(): bool
    {
        return $this->admin === UserTypeEnum::ADMIN;
    }

    public function generateVerificationCode(): string
    {
        return Str::random(40);

    }
}
