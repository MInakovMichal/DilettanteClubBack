<?php

namespace Modules\Language\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code'
    ];

    public function getLanguageByCode($code)
    {
        return self::where('code', strtoupper($code))->first();
    }
}
