<?php

namespace Kwetal\Workdays\Traits;

use Kwetal\DateUtils\DateTime\DateTime;

trait WesternCalendar
{
    public $labelNewYearsDay = 'New Years Day';

    public function getVariableHolidaysWestern($year)
    {
        return [];
    }

    public function getFixedHolidaysWestern($year)
    {
        $day = new DateTime(sprintf('%s-01-01', $year));

        return [$day->addLabel($this->labelNewYearsDay)];
    }

    public function getHolidaysWestern($year)
    {
        return array_merge(
            $this->getVariableHolidaysWestern($year),
            $this->getFixedHolidaysWestern($year)
        );
    }
} 
