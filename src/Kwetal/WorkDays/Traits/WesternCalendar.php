<?php

namespace Kwetal\WorkDays\Traits;

trait WesternCalendar
{
    public function getVariableHolidaysWestern($year)
    {
        return [];
    }

    public function getFixedHolidaysWestern($year)
    {
        return [sprintf('%s-01-01', $year)];
    }
} 
