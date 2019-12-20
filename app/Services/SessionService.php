<?php

namespace App\Services;


class SessionService
{
    /**
     * @param $startDate string
     * @param $chosenDays array
     * @param $sessionsPerChapterCount int
     * @param $chaptersCount int
     * @return array
     */
    public function scheduale($startDate, array $chosenDays, $sessionsPerChapterCount, $chaptersCount)
    {
        // how many sessions should attend per week
        $totalSessionsPerWeekCount = count($chosenDays);
        // calculate total number of sessions student will attend
        $noSessionShouldAttend = $sessionsPerChapterCount * $chaptersCount;
        // calculate how many weeks student will attend sessions on
        $noWeeksShouldAttend = $noSessionShouldAttend / $totalSessionsPerWeekCount;
        $startDateTimeStamp = strtotime($startDate);
        // map days numbers to actual name of week
        $mappedChosenDays = mapWeekEndDays($chosenDays);

        //generate a scheduler
        for($i = 0; $i < $noWeeksShouldAttend; $i++) {
            for($j=0; $j < $totalSessionsPerWeekCount && $noSessionShouldAttend != 0; $j++ ) {
                $daysShouldAttend[] = date("Y-m-d", strtotime("{$mappedChosenDays[$j]} $i week", $startDateTimeStamp));
                $noSessionShouldAttend --;
            }
        }
        sort($daysShouldAttend);

        return $daysShouldAttend;
    }
}