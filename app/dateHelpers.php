<?php

const WEEKEND_DAYS = array(
    1 => 'Saturday',
    2 => 'Sunday',
    3 => 'Monday',
    4 => 'Tuesday',
    5 => 'Wednesday',
    6 => 'Thursday',
    7 => 'Friday'
);

function mapWeekEndDays($numbers)
{
   return array_map(function($day) {
        return WEEKEND_DAYS[$day];
    }, $numbers);
}

