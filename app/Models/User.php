<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Punishment\Entities\Punishment;
use Modules\Question\Entities\Question;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'name',
        'username',
        'email',
        'password',
        'remember_token',
        'email_verified_at',
        'is_verify',
        'actual_interface_language',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_verify' => 'boolean',
    ];

    public function question(): HasMany
    {

        return $this->hasMany(Question::class);
    }

    public function punishment(): HasMany
    {
        return $this->hasMany(Punishment::class);
    }

}
