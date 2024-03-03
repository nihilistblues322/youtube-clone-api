<?php

namespace App\Enums;

use Illuminate\Support\Carbon;

enum Period: string
{
    case YEAR = 'year';
    case MONTH = 'month';
    case WEEK = 'week';
    case DAY = 'day';
    case HOUR = 'hour';

    public function date(): Carbon
    {
        return match ($this) {
            self::YEAR => now()->startOfYear(),
            self::MONTH => now()->startOfMonth(),
            self::WEEK => now()->startOfWeek(),
            self::DAY => now()->startOfDay(),
            self::HOUR => now()->startOfHour(),
        };
    }
}
