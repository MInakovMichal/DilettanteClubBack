<?php

namespace Modules\Question\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'unit',
        'user_id',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
