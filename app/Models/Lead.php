<?php

namespace App\Models;

use App\Enum\InterestType;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';

    protected function casts(): array
    {
        return [
            'interest' => InterestType::class,
        ];
    }
}
