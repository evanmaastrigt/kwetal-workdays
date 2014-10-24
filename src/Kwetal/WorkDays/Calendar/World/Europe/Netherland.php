<?php

namespace Kwetal\WorkDays\Calendar\World\Europe;

use Kwetal\WorkDays\Calendar\CalendarBase;
use Kwetal\WorkDays\Traits\WesternCalendar;
use Kwetal\WorkDays\Traits\ChristianCalendar;

class Netherland extends CalendarBase
{
    use WesternCalendar, ChristianCalendar;

    private $holidays = [];

    public function __construct()
    {
        $this->hasEasterSunday = true;
        $this->hasEasterMonday = true;
    }

    public function addHolidays($year)
    {
        $this->holidays = array_merge(
            $this->holidays,
            $this->getVariableHolidaysChristian($year),
            $this->getVariableHolidaysWestern($year),
            $this->getFixedHolidaysChristian($year),
            $this->getFixedHolidaysWestern($year)
        );

        return $this->holidays;
    }
}

