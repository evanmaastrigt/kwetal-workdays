<?php

namespace Kwetal\Workdays\Traits;

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

    public function getHolidaysWestern($year)
    {
        return array_merge(
            $this->getVariableHolidaysWestern($year),
            $this->getFixedHolidaysWestern($year)
        );
    }
} 
