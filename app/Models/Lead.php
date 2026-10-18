<?php

namespace App\Models;

use App\Enum\InterestType;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';

    protected $fillable = [
        'name',
        'phone',
        'interest',
        'product',
        'comment',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_content',
        'referrer',
    ];

    protected function casts(): array
    {
        return [
            'interest' => InterestType::class,
        ];
    }
}
