<?php

namespace App\Enum;

enum InterestType: string
{
    case ORDER = 'order';
    case SUBSCRIPTION = 'subscription';
    case QUESTION = 'question';
}
