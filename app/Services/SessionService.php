<?php

namespace App\Services;


class SessionService
{
    /**
     * @param $startDate string
     * @param $weeklyAttendingDays array
     * @param $sessionsPerChapterCount int
     * @param $chaptersCount int
     * @return array
     */
    public function scheduale($startDate, array $weeklyAttendingDays, $sessionsPerChapterCount, $chaptersCount)
    {
        // how many sessions should attend per week
        $totalSessionsPerWeek = count($weeklyAttendingDays);
        // calculate total number of sessions student will attend for all chapters
        $noSessionShouldAttend = $sessionsPerChapterCount * $chaptersCount;
        // calculate how many weeks student will attend sessions on
        $noWeeksShouldAttend = $noSessionShouldAttend / $totalSessionsPerWeek;
        $startDateTimeStamp = strtotime($startDate);
        // map days numbers to actual name of week
        $mappedChosenDays = mapWeekEndDays($weeklyAttendingDays);

        //generate a scheduler
        for($i = 0; $i < $noWeeksShouldAttend; $i++) {
            for($j=0; $j < $totalSessionsPerWeek && $noSessionShouldAttend != 0; $j++ ) {
                $daysShouldAttend[] = date("Y-m-d", strtotime("{$mappedChosenDays[$j]} $i week", $startDateTimeStamp));
                $noSessionShouldAttend --;
            }
        }
        sort($daysShouldAttend);

        return $daysShouldAttend;
    }
}