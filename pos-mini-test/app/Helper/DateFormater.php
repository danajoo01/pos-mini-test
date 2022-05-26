<?php

namespace App\Helper;

use DateInterval;
use DatePeriod;

class DateFormater
{
    /**
     * Get List Of Date Between Two Date.
     *
     * @param string $start
     * @param string $end
     *
     * @return array
     */
    public static function between(string $start, string $end)
    {
        // Init Date
        $start_date = date_create($start);
        $end_date = date_create($end);

        // Create Date Period
        $interval = DateInterval::createFromDateString('1 day');
        $daterange = new DatePeriod($start_date, $interval, $end_date);

        $dates = [];
        foreach ($daterange as $date) {
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
    }
}
