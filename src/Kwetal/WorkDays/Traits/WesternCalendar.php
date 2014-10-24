<?php

namespace Kwetal\WorkDays\Traits;

trait WesternCalendar
{
    private function getVariableHolidaysWestern($year)
    {
        return [];
    }

    private function getFixedHolidaysWestern($year)
    {
        return [sprintf('%s-01-01', $year)];
    }
} 
